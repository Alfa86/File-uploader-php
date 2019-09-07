<title>PHP File Upload</title>
<script src="jquery.js"></script>
<script>
    $(document).ready(function()
                     {
        $("#upload-form").on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url:'upload.php',
                type:'POST',
                data:new FormData(this),
                processData:false,
                contentType:false,
                beforeSend:function(){
                    $("#upload-button").val('Working...');
                },
                success:function(data){
                    
                    $("#upload-button").val('Upload');
                    $("#upload-form")[0].reset();
                    $("#message").slideDown('fast');
                    setTimeout(function(){
                        $("#message").slideUp('fast');
                    },3000);
                }
            });
        });
    });
</script>
<style>
    form{
        width: 300px;
        box-sizing: border-box;
        padding: 20px;
        background: #e3dfd7;
        border-radius:10px;
        margin: 150px auto;
    }
    form input
    {
        margin-bottom: 10px;
    }
    form input[type="file"]{
        width: 100%;
        padding: 10px;
        font-size: 18px;
    }
    form input[type="submit"]
    {
        width: 100%;
        border-radius: 10px;
        border:0px;
        background: #33691e;
        color:white;
        padding: 10px;
        font-size: 18px;
    }
    #message
    {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        box-sizing: border-box;
        padding: 10px;
        color: white;
        background: #64dd17;
        text-align: center;
        display: none;
    }
</style>
<div id="message">Files Uploaded!!</div>
<form method="POST" enctype="multipart/form-data" id="upload-form">
    <h1>Ajax File Upload</h1>
    <input type="file" name="file[]" multiple>
    <br>
    <input type="submit" id="upload-button" value="Upload">
</form>