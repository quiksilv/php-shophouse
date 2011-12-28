var J = jQuery.noConflict(); 
var ABSAVE_URL = '/abtests/send'; 
var thisdate = new Date(); 
var tstart =  thisdate.getTime(); 

J(document).ready(function(){ 
    //check if this cookie is set 
    var abtest_id = J.cookie('abtest'); 

    if (abtest_id != '' && abtest_id != 'null'){ 
        var seconds = J.cookie('abtest-seconds') ; 
        //reset 
        J.cookie('abtest' , ''); 
        J.cookie('abtest-seconds' , '') ; 
        bl_send_abtest( abtest_id ,seconds ); 
    } 

    //prep all element 
    J('.abtest').click(function(e){ 
        try { 
            var end = new Date(); 
            var tend = end.getTime() ; 
            var seconds = (tend - tstart) / 1000 ; 
            var id = J(this).attr('id'); 
            var leaving_page = J(this).is('.leaving'); 
            if ( !leaving_page ) { 
                bl_send_abtest( id , seconds ); 
            } else { 
                J.cookie('abtest' , id); 
                J.cookie('abtest-seconds' , seconds); 
            } 
        } catch (error) { 
              
        } 
    }); 
}); 


function bl_send_abtest( id, seconds ){ 
    J.post( ABSAVE_URL ,{ 
        'seconds' : seconds , 
        'id': id 
    } , function(data){ 
         return true; 
    }); 
} 
