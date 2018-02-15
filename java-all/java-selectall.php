<script type="text/javascript">
$(document).ready(function(){

$('#selectallboxes').click(function(even){
        
if(this.checked)
{
$('.checkboxes').each(function(){
this.checked = true;
                
});
}
        
else
{
$('.checkboxes').each(function(){
this.checked = false;
                    
});
}
        
        
});
});
</script>