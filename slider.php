                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php
                                $count_pictures = count($slider_pictures);

                                for($i = 0; $i < $count_pictures; $i++) {

                                $active = ($i === 0 ? ' class="active"' : '');
                                ?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?= $i ?>"<?= $active ?>></li>
                                <?php } ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php
                                $active = ' active';
                                foreach($slider_pictures as $slider_picture) {
                                ?>
                                <div class="item<?= $active ?>">
                                    <img class="slide-image" src="<?= $slider_picture ?>" alt="">
                                </div>
                                <?php
                                $active = '';
                                }
                                ?>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div><!-- /.carousel -->
                    </div><!-- /.col-md-12 -->

                </div><!-- /.row.carousel-holder -->