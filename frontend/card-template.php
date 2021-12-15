<li style="background: #eee !important;" class="rounded">
    <div class="container">
        <a target="_blank" style="text-decoration:none;" href="<?php echo $user["url"]  ?>">
            <div class="body-section  mt-4">
                <ul style="list-style: none; padding: 0">
                    <li class="p-2 card shadow-sm mb-2"
                        style="background: linear-gradient(40deg,#ffd86f,#fc6262)!important;">
                        <div class="title">
                            <div class="row justify-content-center">
                                <div class="">
                                    <div class="text-dark text-center">
                                        <div class="m-auto" style="
                                height: 50px;
                                width: 50px;
                                border-radius: 50%;
                                border: 1px solid #ccc;
                                background-position: center;
                                background-size:cover;
                                background-image:url('<?php echo $user["avatar"]?>');
                            ">
                                        </div>
                                        <div><span class=""><?php echo $user["nickname"] ?></span></div>
                                    </div>
                                    <div style="position: absolute; top: 0px; right: 10px"
                                        class="mt-3 mb-2 h3 float-right">
                                        #
                                        <?php echo $position ?>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <hr class="m-0" />
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-row bg-light justify-content-between">
                                        <div class="pl-2 py-2 text-dark">C</div>
                                        <div class="pl-2 py-2 text-dark">S</div>
                                        <div class="pl-2 py-2 text-dark">M</div>
                                        <div class="pl-2 py-2 text-dark">T</div>
                                        <div class="pl-2 py-2 text-dark">W</div>
                                        <div class="pl-2 py-2 text-dark">T</div>
                                        <div class="pl-2 py-2 text-dark">F</div>
                                        <div class="pl-2 pr-2 py-2 text-dark">S</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contents">
                            <ul style="list-style: none; margin: 0; padding: 0">
                                <li>
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="d-flex flex-row bg-light justify-content-between">
                                                <div class="pl-2 py-2 text-dark">
                                                    <?php echo $user["totalContributions"] ?>
                                                </div>
                                                <div class="pl-2 py-2 text-dark">
                                                    <?php echo $user["contributions"]["0"] ?>
                                                </div>
                                                <div class="pl-2 py-2 text-dark">
                                                    <?php echo $user["contributions"]["1"] ?>
                                                </div>
                                                <div class="pl-2 py-2 text-dark">
                                                    <?php echo $user["contributions"]["2"] ?>
                                                </div>
                                                <div class="pl-2 py-2 text-dark">
                                                    <?php echo $user["contributions"]["3"] ?>
                                                </div>
                                                <div class="pl-2 py-2 text-dark">
                                                    <?php echo $user["contributions"]["4"] ?>
                                                </div>
                                                <div class="pl-2 py-2 text-dark">
                                                    <?php echo $user["contributions"]["5"] ?>
                                                </div>
                                                <div class="pl-2 pr-2 py-2 text-dark">
                                                    <?php echo $user["contributions"]["6"] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </a>
    </div>
</li>