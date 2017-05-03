
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<title></title>
		<script src="js/lrz.bundle.js"></script>

	</head>
	<body>
	<div id="upload-container">
	 <input id="file" type="file" accept="image/*" />
	 </div>
	</body>
	
	<script type="text/javascript">
     document.querySelector('input').addEventListener('change', function () {
    var that = this;

    lrz(that.files[0], {
        width: 800
    })
        .then(function (rst) {
        	var img = new Image();
            img.src = rst.base64;
            img.setAttribute('width',100);
            img.onload = function () {
            	
                document.body.appendChild(img);
            };

            return rst;
            
        });
});
 
</script>
</html>
