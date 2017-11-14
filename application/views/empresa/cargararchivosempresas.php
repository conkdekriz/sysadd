  <table style="text-align:center;margin-top: 120px;width: 100%">
            <tr style="text-align:center;">
                <td>
                    <h1>Sube tus archivos</h1>
                </td>
            </tr>
            <tr style="text-align:center;">
                <td> <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
                    <div class="box" style="" >
                <form name="form" enctype="multipart/form-data" action="/sysadd/index.php/ctl_login_empresa/upload_files" method="post">
                    <div>
                        <input type="file" name="userFiles[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} Archivos Seleccionados" multiple name="archivo"/>
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Selecciona tus archivos&hellip;</span></label>
                    </div> 
                    <div class="form-group">
                        <input class="form-control" type="submit" name="fileSubmit" value="UPLOAD" onclick="comprobar();" style="width:50%;margin-left: 0px;"/>
                    </div>
                </form>
            </div>
</td>
            </tr>
            <tr>
                <td>
                    <h1>Archivos subidos</h1>
                </td>
            </tr>
            <tr>
                <td><?php if (!empty($files)): foreach ($files as $file): ?>

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
                    <p>No hay archivos subidos</p>
                <?php endif; ?></td>
            </tr>
        </table>