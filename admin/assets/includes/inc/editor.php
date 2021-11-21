
<script src="ckeditor/ckeditor.js"></script>
<script>

// The instanceReady event is fired, when an instance of CKEditor has finished
// its initialization.
CKEDITOR.on( 'instanceReady', function( ev ) {
// Show the editor name and description in the browser status bar.
document.getElementById( 'eMessage' ).innerHTML = 'Instance <code>' + ev.editor.name + '<\/code> loaded.';

// Show this sample buttons.
document.getElementById( 'eButtons' ).style.display = 'block';
});

function InsertHTML() {
var editor = CKEDITOR.instances.editor1;
var value = document.getElementById( 'htmlArea' ).value;

if ( editor.mode == 'wysiwyg' )
{
editor.insertHtml( value );
}
else
alert( 'You must be in WYSIWYG mode!' );
}

function InsertText() {
var editor = CKEDITOR.instances.editor1;
var value = document.getElementById( 'txtArea' ).value;

if ( editor.mode == 'wysiwyg' )
{
editor.insertText( value );
}
else
alert( 'You must be in WYSIWYG mode!' );
}

function SetContents() {
var editor = CKEDITOR.instances.editor1;
var value = document.getElementById( 'htmlArea' ).value;

editor.setData( value );
}

function GetContents() {
var editor = CKEDITOR.instances.editor1;

alert( editor.getData() );
}

function ExecuteCommand( commandName ) {
var editor = CKEDITOR.instances.editor1;

// Check the active editing mode.
if ( editor.mode == 'wysiwyg' )
{
editor.execCommand( commandName );
}
else
alert( 'You must be in WYSIWYG mode!' );
}

function CheckDirty() {
var editor = CKEDITOR.instances.editor1;
alert( editor.checkDirty() );
}

function ResetDirty() {
var editor = CKEDITOR.instances.editor1;
editor.resetDirty();
alert( 'The "IsDirty" status has been reset' );
}

function Focus() {
CKEDITOR.instances.editor1.focus();
}

function onFocus() {
document.getElementById( 'eMessage' ).innerHTML = '<b>' + this.name + ' is focused </b>';
}

function onBlur() {
document.getElementById( 'eMessage' ).innerHTML = this.name + ' lost focus';
}

</script>