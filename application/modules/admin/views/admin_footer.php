  <div class="main-content">
  <div class="fluid-container">
  <div class="col-md-12">
                  
 <hr></hr>
       
   <footer>

            <p><?php $date = date('Y');
			  
			   echo "Copyright &copy;$date .  Food and Nutrition Research Institute. Department of Science and Technology | iFNRI Home | Contact us";?></p> 
      </footer>      
          
        </div>
        </div>
        </div>

            <script>
            $(document).ready(function() {
              $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",   
                label_field: "#image-label"
              });
            });  
        
                function readURL1(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#image_upload_preview').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#inputFile1").change(function () {
                    readURL1(this);
                });
            </script>

  </body>
  
</html>

