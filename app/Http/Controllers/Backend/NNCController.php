<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NNCCategory;
use App\Models\NNCLiscenseQuestion;
use App\Imports\ImportNNCObjectiveQuestions;
use App\Exports\ExportNNCQuestionsSample;
use App\Http\Requests\NNC\UpdateNNCQuestionsRequest;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Illuminate\Support\Facades\DB;

class NNCController extends Controller
{
    private $category;
    private $question;

    public function __construct(NNCCategory $category, NNCLiscenseQuestion $question)
    {
        $this->middleware('auth:admin');
        $this->category          = $category;
        $this->question          = $question;
    }

    public function index()
    {
        if(!auth()->user()->can('view-nnc'))
            abort(403, 'Unauthorized action.');

        $nncQuestion        = $this->question;

        if (request()->has('q')) {
            $question          = request('q');
            $nncQuestion      = $nncQuestion->where('question','LIKE',"%{$question}%");
        }


        if (request()->has('category_id') AND !empty(request('category_id'))) {
            $categoryId        = request('category_id');
            $nncQuestion        = $nncQuestion->whereHas('nnc_category',function($query) use ($categoryId){
                $query->where('category_id',$categoryId);
            });
        }

        // if (request()->has('export') AND !empty(request('export'))) {
        //     $result = $objectiveQuestion->latest()->get();
        //     return Excel::download(new ExportNoteObjectiveQuestions($result), 'objective-questions.xlsx');
        // }

        $nncQuestions           = $nncQuestion->latest('id')->paginate(50)->appends([
            'q'                 => request('name'),
            'category_id'        => request('category_id'),
            'status'            => request('status'),
        ]);

        $categories           = $this->category->pluck('name','id');

        return view('backend.nnc.index',compact('nncQuestions','categories'))->with('title','NNC Liscense Questions');
    }

    public function edit($id)
    {
        if(!auth()->user()->can('edit-nnc'))
            abort(403, 'Unauthorized action.');

        $question        = $this->question->find($id);
        $categories      = $this->category->pluck('name','id');

        return view('backend.nnc.edit',compact('categories','question'))->with('title','Edit NNC Question');
    }

    public function update(UpdateNNCQuestionsRequest $request, $id)
    {
        if(!auth()->user()->can('edit-nnc'))
            abort(403, 'Unauthorized action.');

        $question                         = $this->question->find($id);

        $question->question               = $request->question;
        $question->correct_answer         = $request->correct_answer;
        $question->option_1               = $request->option_1;
        $question->option_2               = $request->option_2;
        $question->option_3               = $request->option_3;
        $question->option_4               = $request->option_4;
        $question->option_5               = $request->option_5;
        $question->explanation            = $request->explanation;

        if( $question->save() ){
            session()->flash('success', 'Question Updated');
            return redirect()->route('nnc.index');
        }
    }

    public function destroy($id)
    {
        if(!auth()->user()->can('delete-nnc'))
            abort(403, 'Unauthorized action.');

        $bool = $this->question->where('id', $id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Question deleted successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-nnc'))
            abort(403, 'Unauthorized action.');

        $question        = $this->question->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $question        = $question->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('category_id') AND !empty(request('category_id'))) {
            $question        = $question->where('program_id',request('program_id'));
        }


        $questions           = $question->latest()->paginate(50)->appends([
            'q'                 => request('question'),
            'category_id'       => request('category_id'),
        ]);

        $categories           = $this->category->pluck('name','id');

        return view('backend.nnc.trash',compact('questions','categories'))->with('title','Soft Deleted NNC Questions');
    }

    public function restore($id)
    {
        $bool = $this->question->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "NNC Question restored successfully",
            ]);
        }
    }

    
    public function permanentDelete($id)
    {
        $bool = $this->question->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "NNC Question deleted successfully",
            ]);
        }
    }

    public function getImport()
    {
        if(!auth()->user()->can('import-nnc'))
            abort(403, 'Unauthorized action.');

        if (request()->has('sample') AND !empty(request('sample'))) {
            return Excel::download(new ExportNNCQuestionsSample(collect([])), 'NNC-Questions-sample.xlsx');
        }

        $categories           = $this->category->pluck('name','id');
        return view('backend.nnc.import',compact('categories'))->with('title','Import NNC Liscense Exam Questions');
    }


    public function import(Request $request){
        if(!auth()->user()->can('import-nnc'))
            abort(403, 'Unauthorized action.');

        $this->validate($request, [
            'import_file'               => 'required|mimes:xls,xlsx',
            'category_id'               => 'required|exists:nnc_categories,id'
        ]);

        try {
            Excel::import(new ImportNNCObjectiveQuestions($request->category_id), request()->file('import_file'));
            session()->flash('success', 'NNC Questions Imported');
            return redirect()->route('nnc.index');

        } catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }


    public function showResult(){
        if(!auth()->user()->can('view-nnc'))
            abort(403, 'Unauthorized action.');
        
        if (request()->has('q')) {
            $userRequest        = request('q');
            $user              = $this->user->where('username','LIKE',"%{$userRequest}%")->orWhere('name','LIKE',"%{$userRequest}%");
        }

        // users who played nnc quiz with their results
        $user = DB::table('nnc_results')
                         ->select('user_id', DB::raw('count(*) as no_of_tests'), DB::raw('max(percentage) as highest_score')) 
                         ->groupBy('user_id');
                         

        $users           = $user->latest('id')->paginate(10)->appends([
            'q'                 => request('q')
        ]);                 

        return view('backend.nnc.result',compact('users'))->with('title','NNC Results');
    }
}
