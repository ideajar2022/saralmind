<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\SearchTerm;
use Elasticsearch\ClientBuilder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class SearchController extends Controller
{
	private $note;
	private $searchTerm;
	protected $client;

    public function __construct(Note $note, SearchTerm $searchTerm)
    {
        $this->note        		= $note;
        $this->searchTerm       = $searchTerm;
        // $this->client 			= ClientBuilder::create()->build();
    }

    public function googleSearch(Request $request)
    {
        return view('frontend.google-search');
    }

        public function index(Request $request)
        {
            if (request()->has('q') AND !empty(request('q'))) {

                $q = request('q');
                $notes = $this->note->select('id','program_id','faculty_id','grade_id','subject_id','unit_id','lesson_id','title','slug','summary')->with(['program','faculty','grade','subject','lesson'])
                ->whereHas('program', function($query) use ($q) {
                    $query->where('name','LIKE',"%{$q}%");
                })
                ->whereHas('faculty', function($query) use ($q) {
                    $query->where('name','LIKE',"%{$q}%");
                })
                ->whereHas('grade', function($query) use ($q) {
                    $query->where('name','LIKE',"%{$q}%");
                })
                ->orWhereHas('subject', function($query) use ($q) {
                    $query->where('name','LIKE',"%{$q}%");
                })
                ->orWhereHas('lesson', function($query) use ($q) {
                    $query->where('name','LIKE',"%{$q}%");

                })
                ->orWhere(function($query) use ($q) {
                      $query->where('title','LIKE',"%{$q}%")
                        ->orWhere('summary','LIKE',"%{$q}%");
                })
                ->where(['status'=>'APPROVED'])
                ->latest()->paginate(5)->appends([
                    'q'                 => $q
                ]);

                $this->searchTerm->create([
                    'name'      => $q,
                    'ip'        => request()->ip(),
                    'source'    => 'Website'
                ]);

                return view('frontend.search.index',compact('notes'));
            }

            abort(404);
            // return $notes;
        }

    public function index1(Request $request)
    {
        if($request->has('q') && $request->input('q')) {

        	$per_page 	= $request->get('limit', 10);
    		$from 		= ($request->get('page', 1) - 1) * $per_page;

            // Search for given q and return data
            $data = $this->_searchNotes($request->input('q'),$from,$per_page);
            $notesArray = [];

            // If there are any notes that match given search text "hits" fill their id's in array
            if($data['hits']['total'] > 0) {

                foreach ($data['hits']['hits'] as $hit) {
                    $notesArray[] = $hit['_source']['id'];
                }
            }


    		$admin_exceptions = new LengthAwarePaginator(
	            $data['hits'],
	            //$data['total'],
	            $per_page,
	            Paginator::resolveCurrentPage(),
    			['path' => Paginator::resolveCurrentPath()]
        	);

        	return $admin_exceptions;

            return $data['hits'];

            // Return to view with data
            return view('movies.index', ['movies' => $notesArray]);
        } else {
            return redirect()->route('movies');
        }
    }

    private function _searchNotes($text,$from,$per_page)
    {
        $params = [
            'index' => Note::ELASTIC_INDEX,
            'type' => Note::ELASTIC_TYPE,
            'body' => [
                'sort' => [
                    '_score'
                ],
                'from' => $from,
                'size' => $per_page,
                'query' => [
                    'bool' => [
                        'should' => [
                            ['match' => [
                                'title' => [
                                    'query'     => $text,
                                    'fuzziness' => '1'
                                ]
                            ]],
                            ['match' => [
                                'summary' => [
                                    'query'     => $text,
                                    'fuzziness' => '0'
                                ]
                            ]],
                            ['match' => [
                                'program' => [
                                    'query'     => $text,
                                    'fuzziness' => '0'
                                ]
                            ]],
                            ['match' => [
                                'grade' => [
                                    'query'     => $text,
                                    'fuzziness' => '0'
                                ]
                            ]],
                            ['match' => [
                                'subject' => [
                                    'query'     => $text,
                                    'fuzziness' => '0'
                                ]
                            ]]
                        ]
                    ],
                ],
            ]
        ];

        $data = $this->client->search($params);
        return $data;
    }
}
