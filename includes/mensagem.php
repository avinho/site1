<?php
session_start();

if(isset($_SESSION['mensagem'])){ ?>
    <script>
        window.onload = function() {
            M.toast({html: '<?php echo $_SESSION['mensagem']; ?>', classes: 'rounded'});
        }
    </script>
<?php }; 
    unset($_SESSION['mensagem']);
?>  