
        <div id="page-wrapper">
            <?php if($this->session->flashdata('success')):?>
                &nbsp;<div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('success'); ?></strong>
                </div>
            <?php elseif($this->session->flashdata('error')):?>
                &nbsp;<div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
            <?php endif;?>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Dashboard</h3>
                </div>
                <div class="col-lg-12">
                    <div class="row text-center">

                <!-- Dasboard Activity -->
                <!-- /.row -->
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="id_count_users" >26</div>
                                    <div>Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="id_count_chats">12</div>
                                    <div>Forum</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- wrapper -->
            






