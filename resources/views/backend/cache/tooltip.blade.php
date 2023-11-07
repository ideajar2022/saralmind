
<script>
	
	var glossariesArray = {!! $glossaries !!}

    $.each(glossariesArray, function (index, value) {

        $(".note-wrapper:contains(" + value.word + ")").html(function (_, html) {
            var regex = new RegExp(value.word, 'g');
            
            return html.replace(regex, '<span  data-toggle="tooltip" class="underline '+value.word.split(' ').join('-')+'">' + value.word + '</span>');
        });

    });

    @foreach($glossaries as $glossary)

    	tippy(document.querySelectorAll('.{{ \Str::slug($glossary->word) }}'), {
	      content: "{{ $glossary->meaning_english }}"
	    });
    @endforeach

   

</script>