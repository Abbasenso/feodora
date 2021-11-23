
function send_message() {
    alert ('send_message');
}

function user_regs() {
   var name =jQuery("#name").val();
   var email =jQuery("#email").val();
   var mobile =jQuery("#mobile").val();
   var password =jQuery("#password").val();

   if (name=="") {
    alert('pleae enter name');
   }

   else if (email=="") {
    alert('pleae enter email');
   }

   else if (mobile=="") {
    alert('pleae enter mobile');
   }

    else if (message=="") {
    alert('pleae enter message');
   }


   else if (password=="") {
    alert('pleae enter password');
   }
   else{
    jQuery.ajax({
        url:'send_message.php',
        type:'post',
        data:'name='+name+'&email='+email+'&number='+mobile+'&message='+message,
        success:function(result){
            alert(result);
        } 
    });
   }
}

function user_login()
{
    alert("please fieeled this form");
}

function manage_cart(pid,type){
    if(type=='update'){
        var qty=jQuery("#"+pid+"qty").val();
    }else{
        var qty=jQuery("#qty").val();
    }
    jQuery.ajax({
        url:'manage_cart.php',
        type:'post',
        data:'pid='+pid+'&qty='+qty+'&type='+type,
        success:function(result){
            if(type=='update' || type=='remove'){
                window.location.href=window.location.href;
            }
            if(type=='add'){
                window.location.href="viewpage.php";
                //alert("please fieeled this form");
            }
            if(result=='not_avaliable'){
                alert('Qty not avaliable'); 
            }else{
                jQuery('.htc__qua').html(result);
            }
        }   
    }); 
}
