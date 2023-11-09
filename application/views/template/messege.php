<?php if ($this->session->has_userdata('success')) { ?>
<div class="alert alert-primary  alert-dismissible fade show" role="alert">
    <?php echo $this->session->flashdata('success');?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php }?>