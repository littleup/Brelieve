tinyMCE.init({
	//selector: "textarea",
	mode: "textareas", // important
	editor_selector: "editor-instance",	// important
    valid_elements: '*[*]',
	height: "250",
	
	
	menubar: false,
	
	toolbar1: "fontsizeselect | cut copy paste | bold italic underline strikethrough | justifyleft justifycenter justifyright justifyfull | table | removeformat | undo redo | bullist numlist | outdent indent blockquote | link unlink | forecolor backcolor",
    toolbar_items_size: 'small',
	
	
	//toolbar: 'fontsizeselect',
  	//fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt'
	
	browser_spellcheck: true
	
});