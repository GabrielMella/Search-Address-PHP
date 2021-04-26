<?php 
    include('config/config.php');
    include('header2.php');
?>

    <div id="video-container">
        <div class="video-overlay"></div>
        <div class="video-content">
            <div class="inner">
                <div class="container">
                    <div class="d-flex justify-content-center">
                        <table class="table table-bordered table-hover table-light" style="width: 70%; margin-top:50px;">
                            <thead>
                                <tr>
                                    <th scope="col">CEP</th>
                                    <th scope="col">CIDADE</th>
                                    <th scope="col">ESTADO</th>
                                    <th scope="col">RUA</th>
                                    <th scope="col">BAIRRO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php print_r($result['cep']) ?>
                                    </td>
                                    <td>
                                        <?php print_r($result['cidade']) ?>
                                    </td>
                                    <td>
                                        <?php print_r($result['estado']) ?>
                                    </td>
                                    <td>
                                        <?php print_r($result['rua']) ?>
                                    </td>
                                    <td>
                                        <?php print_r($result['bairro']) ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table> 
                    </div>
                    <div class="form-group">
                        <a href="index.php" class="btn btn-primary" style="margin-left: 470px; text-decoration: none;">Nova Busca</a>
                    </div> 
                </div>
            </div>
        </div>
        <video autoplay loop muted>
            <source src="assets/video/highway-loop.mp4" type="video/mp4"/>
        </video>
    </div>
</body>
</html>