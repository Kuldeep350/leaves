 <?php include "header.php" ?>
    <?php include "siderbar.php" ?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">View Recoder</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">View Recoder</li>
                        </ol>
                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Leave History</h4>


                                    <div class="form-group">
                                      <div class="input-group">
                                        <input type="text" name="search_text" id="search_text"placeholder="search by name...."class="form-control"/>


                                </div>
                            </div>
                            <br>
                            <div id="result">
                        </div>
                    </div>
                </div>
              </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
          </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <script>
                              $(document).ready(function(){
                                $('#search_text').keyup(function(){
                                  var txt = $(this).val();
                                  if (txt != '')
                                  {
                                    $.ajax({
                                      url:"fetch.php",
                                      mathod:"post",
                                      data:{search:txt},
                                      dataType:"text",
                                      success:function(data)
                                      {
                                        $('#result').html(data);
                                      }
                                    });
                                  }
                                  else
                                  {
                                    $('#result').html('');
                                    $.ajax({
                                      url:"fetch.php",
                                      mathod:"post",
                                      data:{search:txt},
                                      dataType:"text",
                                      success:function(data)
                                      {
                                        $('#result').html(data);
                                      }
                                    });
                                  }
                                });
                              });
            </script>

            <?php include "footer.php" ?>
