<!DOCTYPE html>
<html>
<head>
	<title>Multi Img</title>
	<link href="/uploader/dist/image-uploader.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="/uploader/dist/image-uploader.min.js"></script>
<!-- https://www.jqueryscript.net/form/drag-drop-image-uploader.html -->
</head>
<body>
	<form action="/multi-img" enctype="multipart/form-data" method="post">
    <?= csrf_field() ?>
	  <div class="input-images"></div>
    <input type="text" name="title">
    <button type="submit">Run</button>
	</form>

<script>
let preloaded = [
            {id: 1, src: 'https://picsum.photos/500/500?random=1'},
            {id: 2, src: 'https://picsum.photos/500/500?random=2'},
            {id: 3, src: 'https://picsum.photos/500/500?random=3'},
            {id: 4, src: 'https://picsum.photos/500/500?random=4'},
            {id: 5, src: 'https://picsum.photos/500/500?random=5'},
            {id: 6, src: 'https://picsum.photos/500/500?random=6'},
        ];

$(function () {
	$('.input-images').imageUploader({
        imagesInputName: 'photos',
        extensions: ['.jpg','.jpeg','.png','.gif','.svg', '.PNG', 'JPG', 'JPEG', '.GIF', '.SVG'],
          // mimes: ['image/jpeg','image/png','image/gif','image/svg+xml'],
          maxSize: undefined,
          maxFiles: 5,
          label:'Drag & Drop files here or click to browse, up to 5 photos'

          // preloaded: preloaded
            // imagesInputName: 'photos',
            // preloadedInputName: 'old'
    });
});
</script>
</body>
</html>