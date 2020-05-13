<script >
	




 $.ajax({
    url: "post_delete_members.php",
    type: "post",
    data: $('.ids:checked').serialize(),
    success: function(data) {
    $('#response').html(data);
    }
});








</script>
