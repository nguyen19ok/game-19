</div></div>





<script>


  $('form').submit(function() {
         $("#splash-screen").show();
      
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 0)
        {
            $('#ducnghia').html(this.responseText);

        }
                    $("#splash-screen").fadeOut();

    };
    xhttp.open($(this).attr('method'), $(this).attr('action'), true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xhttp.send("t=1&load=<?=base64_encode(md5(time()))?>&"+$(this).serialize());

    history.pushState("object or string representing the state of the page", "Xin Chao", $(this).attr('action'));   
    return false;
});
</script>


<script>
     

function checkmenubar() {
	
var thinhle = $('#checkmnb').hasClass('menu-show nav-show');

if (thinhle==true) {
            $('header .header-nav-menu')['removeClass']('menu-show nav-show');

} else {
            $('header .header-nav-menu')['addClass']('menu-show nav-show');

}

}   
function confirm_popup() {
	
var thinhle = $('#checkpopup').hasClass('action-show');

if (thinhle==true) {
            $('.w-dragon .dragon-notice-gold')['removeClass']('action-show');

} else {
            $('.w-dragon .dragon-notice-gold')['addClass']('action-show');

}

}    

    



</script>







<?php
if(!isset($_POST['load']))
{ ?>
<style>
    .btn-primary {
    padding: 1rem 1.75rem;
    font-size: 2rem;
    border-radius: 1rem;
}
</style>




</section> <!-----ID ducnghia----->

</div>
</div>
</div>
</div>


<!--------->

<!---------->

</body>





</html>
<?PHP } ?>