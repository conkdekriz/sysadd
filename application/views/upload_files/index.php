<script src="/sysadd/JS/googleapis/ajax/jquery1.7.1/jquery.min.js" language="javascript"></script>
<link rel="stylesheet" href="/sysadd/JS/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="/sysadd/JS/source/jquery.fancybox.pack.js?v=2.1.5"></script>         
<style>   .div_presentacion{
        margin-top:90px; 
        width: 200px;
        height: auto;
        word-wrap: break-word; 
        float:left; 
        position: relative;
        text-align: center;
        margin-left: 20px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {

        $(".fancybox").fancybox({
            openEffect: 'elastic',
            closeEffect: 'elastic',
            fitToView: true,
            iframe: {
                preload: false

            }
        });
    });
</script>


<?php if (!empty($files)): foreach ($files as $file): ?>

        <div class="div_presentacion">
            <a class="fancybox" thumbnail="http://fancyapps.com/fancybox/demo/2_s.jpg" data-fancybox-type="iframe" style="text-decoration:none;color:#8CB00E" href="<?php echo base_url('upload/files/' . $file['file_name']); ?>">
                <?php if (strpos($file['file_name'], 'pdf')) { ?>
                    <img style="max-width: 80%;height: auto;width: auto/9;" src="/sysadd/images/logo_pdf.png" alt="" >
                <?php } else { ?>
                    <img style="max-width: 80%;height: auto;width: auto/9;" src="<?php echo base_url('upload/files/' . $file['file_name']); ?>" alt="" >
                <?php } ?>
                <p><?php echo $file['file_name']; ?></p>
                <p>Subida el <?php echo date("d M Y", strtotime($file['created'])); ?></p>
            </a>
        </div>
        <?php
    endforeach;
else:
    ?>
<div style="margin-top: 120px">
    <p>No hay archivos subidos</p>
</div>
<?php endif; ?>