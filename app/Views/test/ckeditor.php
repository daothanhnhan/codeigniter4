<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>A Simple Page with CKEditor 4</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script src="/ckeditor/ckeditor.js"></script>
        <!-- <script src="//cdn.ckeditor.com/4.25.1/full/ckeditor.js"></script> -->
    </head>
    <body>
        <form>
            <textarea name="editor1" id="editor2" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor 4.
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'editor2' );
            </script>
        </form>
    </body>