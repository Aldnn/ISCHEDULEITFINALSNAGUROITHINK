let btn = document.querySelector("#btn");
                let sidebar = document.querySelector(".sidebar");
                btn.onclick = function(){
                  sidebar.classList.toggle("active");
                }


                $('.delete-btn').click(function(e) {
                    e.preventDefault();     
                    var deleteId = $(this).data('id'); 
                    $.ajax({
                        type: "POST",
                        url: "delete.php", 
                        data: { delete_id: deleteId },
                        success: function(response) {
                            
                
                            $('#modalMessage').text(response); 
                            $('#successModal').modal('show'); 
                
                        },
                
                        error: function() {
                
                            $('#modalMessage').text('An unexpected error occurred.'); // Set a generic error message
                
                            $('#successModal').modal('show'); 
                
                        }
                
                    });
                
                });


            

            