<?php

function component($productname, $productowner, $productimg, $productid){
    $element ="
    <div class=\"col-lg-3 col-sm-6 my-3 my-md-2\"> <!--margin y = 3-->
                        <form action=\"index.php\" method=\"post\">
                            <div class=\"card shadow\">
                                <div>
                                    <img src=\"uploads/$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                                </div>
                                <div class=\"card-body\">
                                    <h6 class=\"product-title\">
                                        $productname
                                    </h6>
                                    <small><p class=\"product-owner\">
                                        $productowner
                                    </p></small>

                                    <button type=\"submit\" class=\"tambah-keRak\" name=\"add\"
                                    style=\"
                                    \display: block;
                                    padding: 4px;
                                    color: #FFFFFF;
                                    background: #8ec6ff;
                                    text-align: center;
                                    text-decoration: none;
                                    transition: .3s;
                                    cursor: pointer;
                                    border-radius: 4px;\"
                                    >Tambahkan ke Rak</button>

                                    <input type='hidden' name='product_id' value='$productid'>
                                </div>
                            </div>
                        </form>
                    </div>
    ";
    echo $element;
}

function ractElement($productimg, $productname, $productowner, $productid) {
    $element = "

    <form action=\"rak.php?action=remove&id=$productid\" method=\"post\" class=\"rak-items\">
                            <div class=\"border rounded\">
                                <div class=\"row bg-white\">
                                    <div class=\"col-lg-3\">
                                        <img src=\"uploads/$productimg\" alt=\"Image1\" class=\"img-fluid\">
                                    </div>
                                    <div class=\"col-lg-6\">
                                        <h5 class=\"pt-2 my-2\">$productname</h5>
                                        <h6 class=\"text-secondary\">$productowner</h6>
                                        <button type=\"submit\" class=\"btn btn-primary\">Chat Pemilik</button>
                                        <button type=\"submit\" class=\"btn btn-danger my-5\" name=\"remove\">Kembalikan</button>
                                    </div>
                                    <div class=\"col-lg-3\"></div>
                                </div>
                            </div>
                        </form>

    ";
    echo $element;
}

