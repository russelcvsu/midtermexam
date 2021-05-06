

    function displayModal(){
        session_start();
        var user = document.getElementById("username");
        user.style.display = "flex";
        var btn =   document.getElementById("login");
        var modal = document.getElementById("bg-modal");
       modal.style.display ="flex";
        if(document.querySelector(".close") !== null){
        document.querySelector(".close").addEventListener("click", 
        function(){
         document.querySelector(".bg-modal").style.display = "none";
          });
        }
    }
