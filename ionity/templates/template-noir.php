<?php

/*

  Template Name: Noir

 */

get_header('noir');

if( have_rows('content_noir') ):

    while( have_rows('content_noir') ): the_row();

        get_template_part('templates/section-noir/' . get_row_layout());

    endwhile;

endif;

?>


    <div class="block-03">
        <div class="underlayer">NOIR by IONITY</div>
        <div class="block-header">
            <h2>NOIR by IONITY</h2>
            <div class="tab-nav">
                <ul>
                    <li><a href="#" class="active" data-tab="1">Connectors</a></li>
                    <li><a href="#" data-tab="2">Sockets</a></li>
                </ul>
            </div>
        </div>
        <div class="tabs">
            <div class="wrapper">
                <div class="tab-panel">
                    <div class="container-fluid">
                        <div class="product-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product-item">
                                        <div class="product-image">
                                            <img class="lazy" data-src="assets/img/c01.png" srcset="assets/img/c01.png 1x, assets/img/c01@2x.png 2x" alt="" />
                                        </div>
                                        <div class="product-description">
                                            <div class="product-header">
                                                <span class="icon"><img src="assets/img/noir-logo-one.svg" alt="" /></span>
                                                Noir <strong>eOne</strong>
                                            </div>
                                            <div class="d-md-none">
                                                <a href="#" class="btn btn-dark">buy from $799</a>
                                                <button type="button" class="btn-details">See details</button>
                                            </div>
                                            <div class="d-none d-md-block">
                                                <div class="price">from $799</div>
                                                <a href="#" class="btn btn-dark">buy</a>
                                            </div>
                                        </div>
                                        <div class="product-details">
                                            <ul>
                                                <li>
                                                    <div class="title">Size</div>
                                                    <div class="options">
                                                        <p>317*105 mm</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Montage</div>
                                                    <div class="options"><span>Wall</span>/<span>Stand</span></div>
                                                </li>
                                                <li class="equal">
                                                    <div class="title">Connector 1</div>
                                                    <div class="options">
                                                        <div class="list"><span>Type 1 j1772</span><span>Mennekes Type 2</span><span>GB/T-AC</span></div>
                                                    </div>
                                                </li>
                                                <li class="equal">
                                                    <div class="title">Connector 2</div>
                                                    <div class="options">
                                                        <p>N/A</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Maximum current</div>
                                                    <div class="options">
                                                        <p>32 A</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Maximum power</div>
                                                    <div class="options">
                                                        <div class="list">
                                                            <div>7 kWt /<span>Type 1 j1772</span></div>
                                                            <div>22 kWt /<span>Mennekes Type 2</span></div>
                                                            <div>22 kWt /<span>GB/T-AC</span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title d-lg-none">RFID</div>
                                                    <div class="options">
                                                        <p>N/A</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Protocol</div>
                                                    <div class="options">
                                                        <p>N/A</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-item">
                                        <div class="product-image">
                                            <img class="lazy" data-src="assets/img/c02.png" srcset="assets/img/c02.png 1x, assets/img/c02@2x.png 2x" alt="" />
                                        </div>
                                        <div class="product-description">
                                            <div class="product-header">
                                                <span class="icon"><img src="assets/img/noir-logo-one.svg" alt="" /></span>
                                                Noir <strong>iOne</strong>
                                            </div>
                                            <div class="d-md-none">
                                                <a href="#" class="btn btn-dark">buy from $999</a>
                                                <button type="button" class="btn-details">See details</button>
                                            </div>
                                            <div class="d-none d-md-block">
                                                <div class="price">from $999</div>
                                                <a href="#" class="btn btn-dark">buy</a>
                                            </div>
                                        </div>
                                        <div class="product-details">
                                            <ul>
                                                <li>
                                                    <div class="title">Size</div>
                                                    <div class="options">
                                                        <p>317*105 mm</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Montage</div>
                                                    <div class="options"><span>Wall</span>/<span>Stand</span></div>
                                                </li>
                                                <li class="equal">
                                                    <div class="title">Connector 1</div>
                                                    <div class="options">
                                                        <div class="list"><span>Type 1 j1772</span><span>Mennekes Type 2</span><span>GB/T-AC</span></div>
                                                    </div>
                                                </li>
                                                <li class="equal">
                                                    <div class="title">Connector 2</div>
                                                    <div class="options">
                                                        <p>N/A</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Maximum current</div>
                                                    <div class="options">
                                                        <p>32 A</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Maximum power</div>
                                                    <div class="options">
                                                        <div class="list">
                                                            <div>7 kWt /<span>Type 1 j1772</span></div>
                                                            <div>22 kWt /<span>Mennekes Type 2</span></div>
                                                            <div>22 kWt /<span>GB/T-AC</span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title d-lg-none">RFID</div>
                                                    <div class="options">
                                                        <img src="assets/img/rfid.svg" alt="" />
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Protocol</div>
                                                    <div class="options">
                                                        <p>OCPP 1.6/2.0</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-item">
                                        <div class="product-image">
                                            <img class="lazy" data-src="assets/img/c03.png" srcset="assets/img/c03.png 1x, assets/img/c03@2x.png 2x" alt="" />
                                        </div>
                                        <div class="product-description">
                                            <div class="product-header">
                                                <span class="icon"><img src="assets/img/noir-logo-duo.svg" alt="" /></span>
                                                Noir <strong>eDuo</strong>
                                            </div>
                                            <div class="d-md-none">
                                                <a href="#" class="btn btn-dark">buy from $1,199</a>
                                                <button type="button" class="btn-details">See details</button>
                                            </div>
                                            <div class="d-none d-md-block">
                                                <div class="price">from $1,199</div>
                                                <a href="#" class="btn btn-dark">buy</a>
                                            </div>
                                        </div>
                                        <div class="product-details">
                                            <ul>
                                                <li>
                                                    <div class="title">Size</div>
                                                    <div class="options">
                                                        <p>450*105 mm</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Montage</div>
                                                    <div class="options"><span>Wall</span>/<span>Stand</span></div>
                                                </li>
                                                <li class="equal">
                                                    <div class="title">Connector 1</div>
                                                    <div class="options">
                                                        <div class="list"><span>Type 1 j1772</span><span>Mennekes Type 2</span><span>GB/T-AC</span></div>
                                                    </div>
                                                </li>
                                                <li class="equal">
                                                    <div class="title">Connector 2</div>
                                                    <div class="options">
                                                        <div class="list"><span>Type 1 j1772</span><span>Mennekes Type 2</span><span>GB/T-AC</span></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Maximum current</div>
                                                    <div class="options">
                                                        <p>32 A</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Maximum power</div>
                                                    <div class="options">
                                                        <div class="list">
                                                            <div>7 kWt /<span>Type 1 j1772</span></div>
                                                            <div>22 kWt /<span>Mennekes Type 2</span></div>
                                                            <div>22 kWt /<span>GB/T-AC</span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title d-lg-none">RFID</div>
                                                    <div class="options">
                                                        <p>N/A</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Protocol</div>
                                                    <div class="options">
                                                        <p>N/A</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-item">
                                        <div class="product-image">
                                            <img class="lazy" data-src="assets/img/c04.png" srcset="assets/img/c04.png 1x, assets/img/c04@2x.png 2x" alt="" />
                                        </div>
                                        <div class="product-description">
                                            <div class="product-header">
                                                <span class="icon"><img src="assets/img/noir-logo-duo.svg" alt="" /></span>
                                                Noir <strong>iDuo</strong>
                                            </div>
                                            <div class="d-md-none">
                                                <a href="#" class="btn btn-dark">buy from $1,499</a>
                                                <button type="button" class="btn-details">See details</button>
                                            </div>
                                            <div class="d-none d-md-block">
                                                <div class="price">from $1,499</div>
                                                <a href="#" class="btn btn-dark">buy</a>
                                            </div>
                                        </div>
                                        <div class="product-details">
                                            <ul>
                                                <li>
                                                    <div class="title">Size</div>
                                                    <div class="options">
                                                        <p>450*105 mm</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Montage</div>
                                                    <div class="options"><span>Wall</span>/<span>Stand</span></div>
                                                </li>
                                                <li class="equal">
                                                    <div class="title">Connector 1</div>
                                                    <div class="options">
                                                        <div class="list"><span>Type 1 j1772</span><span>Mennekes Type 2</span><span>GB/T-AC</span></div>
                                                    </div>
                                                </li>
                                                <li class="equal">
                                                    <div class="title">Connector 2</div>
                                                    <div class="options">
                                                        <div class="list"><span>Type 1 j1772</span><span>Mennekes Type 2</span><span>GB/T-AC</span></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Maximum current</div>
                                                    <div class="options">
                                                        <p>32 A</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Maximum power</div>
                                                    <div class="options">
                                                        <div class="list">
                                                            <div>7 kWt /<span>Type 1 j1772</span></div>
                                                            <div>22 kWt /<span>Mennekes Type 2</span></div>
                                                            <div>22 kWt /<span>GB/T-AC</span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title d-lg-none">RFID</div>
                                                    <div class="options">
                                                        <img src="assets/img/rfid.svg" alt="" />
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Protocol</div>
                                                    <div class="options">
                                                        <p>OCPP 1.6/2.0</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
                <div class="tab-panel">
                    <div class="container-fluid">
                        <div class="product-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product-item">
                                        <div class="product-image">
                                            <img class="lazy" data-src="assets/img/s01.png" srcset="assets/img/s01.png 1x, assets/img/s01@2x.png 2x" alt="" />
                                        </div>
                                        <div class="product-description">
                                            <div class="product-header">
                                                <span class="icon"><img src="assets/img/noir-logo-one.svg" alt="" /></span>
                                                Noir <strong>eOne</strong>
                                            </div>
                                            <div class="d-md-none">
                                                <a href="#" class="btn btn-dark">buy from $1,199</a>
                                                <button type="button" class="btn-details">See details</button>
                                            </div>
                                            <div class="d-none d-md-block">
                                                <div class="price">from $1,199</div>
                                                <a href="#" class="btn btn-dark">buy</a>
                                            </div>
                                        </div>
                                        <div class="product-details">
                                            <ul>
                                                <li>
                                                    <div class="title">Size</div>
                                                    <div class="options">
                                                        <p>317*105 mm</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Montage</div>
                                                    <div class="options"><span>Stand</span></div>
                                                </li>
                                                <li class="equal">
                                                    <div class="title">Socket 1</div>
                                                    <div class="options">
                                                        <div class="list"><span>Type 1 j1772</span><span>Mennekes Type 2</span><span>GB/T-AC</span></div>
                                                    </div>
                                                </li>
                                                <li class="equal">
                                                    <div class="title">Socket 2</div>
                                                    <div class="options">
                                                        <p>N/A</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Maximum current</div>
                                                    <div class="options">
                                                        <p>32 A</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Maximum power</div>
                                                    <div class="options">
                                                        <div class="list">
                                                            <div>7 kWt /<span>Type 1 j1772</span></div>
                                                            <div>22 kWt /<span>Mennekes Type 2</span></div>
                                                            <div>22 kWt /<span>GB/T-AC</span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title d-lg-none">RFID</div>
                                                    <div class="options">
                                                        <p>N/A</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Protocol</div>
                                                    <div class="options">
                                                        <p>N/A</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-item">
                                        <div class="product-image">
                                            <img class="lazy" data-src="assets/img/s02.png" srcset="assets/img/s02.png 1x, assets/img/s02@2x.png 2x" alt="" />
                                        </div>
                                        <div class="product-description">
                                            <div class="product-header">
                                                <span class="icon"><img src="assets/img/noir-logo-one.svg" alt="" /></span>
                                                Noir <strong>iOne</strong>
                                            </div>
                                            <div class="d-md-none">
                                                <a href="#" class="btn btn-dark">buy from $1,399</a>
                                                <button type="button" class="btn-details">See details</button>
                                            </div>
                                            <div class="d-none d-md-block">
                                                <div class="price">from $1,399</div>
                                                <a href="#" class="btn btn-dark">buy</a>
                                            </div>
                                        </div>
                                        <div class="product-details">
                                            <ul>
                                                <li>
                                                    <div class="title">Size</div>
                                                    <div class="options">
                                                        <p>317*105 mm</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Montage</div>
                                                    <div class="options"><span>Stand</span></div>
                                                </li>
                                                <li class="equal">
                                                    <div class="title">Socket 1</div>
                                                    <div class="options">
                                                        <div class="list"><span>Type 1 j1772</span><span>Mennekes Type 2</span><span>GB/T-AC</span></div>
                                                    </div>
                                                </li>
                                                <li class="equal">
                                                    <div class="title">Socket 2</div>
                                                    <div class="options">
                                                        <p>N/A</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Maximum current</div>
                                                    <div class="options">
                                                        <p>32 A</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Maximum power</div>
                                                    <div class="options">
                                                        <div class="list">
                                                            <div>7 kWt /<span>Type 1 j1772</span></div>
                                                            <div>22 kWt /<span>Mennekes Type 2</span></div>
                                                            <div>22 kWt /<span>GB/T-AC</span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title d-lg-none">RFID</div>
                                                    <div class="options">
                                                        <img src="assets/img/rfid.svg" alt="" />
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Protocol</div>
                                                    <div class="options">
                                                        <p>OCPP 1.6/2.0</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-item">
                                        <div class="product-image">
                                            <img class="lazy" data-src="assets/img/s03.png" srcset="assets/img/s03.png 1x, assets/img/s03@2x.png 2x" alt="" />
                                        </div>
                                        <div class="product-description">
                                            <div class="product-header">
                                                <span class="icon"><img src="assets/img/noir-logo-duo.svg" alt="" /></span>
                                                Noir <strong>eDuo</strong>
                                            </div>
                                            <div class="d-md-none">
                                                <a href="#" class="btn btn-dark">buy from $1,599</a>
                                                <button type="button" class="btn-details">See details</button>
                                            </div>
                                            <div class="d-none d-md-block">
                                                <div class="price">from $1,599</div>
                                                <a href="#" class="btn btn-dark">buy</a>
                                            </div>
                                        </div>
                                        <div class="product-details">
                                            <ul>
                                                <li>
                                                    <div class="title">Size</div>
                                                    <div class="options">
                                                        <p>450*105 mm</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Montage</div>
                                                    <div class="options"><span>Stand</span></div>
                                                </li>
                                                <li class="equal">
                                                    <div class="title">Socket 1</div>
                                                    <div class="options">
                                                        <div class="list"><span>Type 1 j1772</span><span>Mennekes Type 2</span><span>GB/T-AC</span></div>
                                                    </div>
                                                </li>
                                                <li class="equal">
                                                    <div class="title">Socket 2</div>
                                                    <div class="options">
                                                        <div class="list"><span>Type 1 j1772</span><span>Mennekes Type 2</span><span>GB/T-AC</span></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Maximum current</div>
                                                    <div class="options">
                                                        <p>32 A</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Maximum power</div>
                                                    <div class="options">
                                                        <div class="list">
                                                            <div>7 kWt /<span>Type 1 j1772</span></div>
                                                            <div>22 kWt /<span>Mennekes Type 2</span></div>
                                                            <div>22 kWt /<span>GB/T-AC</span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title d-lg-none">RFID</div>
                                                    <div class="options">
                                                        <p>N/A</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Protocol</div>
                                                    <div class="options">
                                                        <p>N/A</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-item">
                                        <div class="product-image">
                                            <img class="lazy" data-src="assets/img/s04.png" srcset="assets/img/s04.png 1x, assets/img/s04@2x.png 2x" alt="" />
                                        </div>
                                        <div class="product-description">
                                            <div class="product-header">
                                                <span class="icon"><img src="assets/img/noir-logo-duo.svg" alt="" /></span>
                                                Noir <strong>iDuo</strong>
                                            </div>
                                            <div class="d-md-none">
                                                <a href="#" class="btn btn-dark">buy from $1,799</a>
                                                <button type="button" class="btn-details">See details</button>
                                            </div>
                                            <div class="d-none d-md-block">
                                                <div class="price">from $1,799</div>
                                                <a href="#" class="btn btn-dark">buy</a>
                                            </div>
                                        </div>
                                        <div class="product-details">
                                            <ul>
                                                <li>
                                                    <div class="title">Size</div>
                                                    <div class="options">
                                                        <p>450*105 mm</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Montage</div>
                                                    <div class="options"><span>Stand</span></div>
                                                </li>
                                                <li class="equal">
                                                    <div class="title">Socket 1</div>
                                                    <div class="options">
                                                        <div class="list"><span>Type 1 j1772</span><span>Mennekes Type 2</span><span>GB/T-AC</span></div>
                                                    </div>
                                                </li>
                                                <li class="equal">
                                                    <div class="title">Socket 2</div>
                                                    <div class="options">
                                                        <div class="list"><span>Type 1 j1772</span><span>Mennekes Type 2</span><span>GB/T-AC</span></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Maximum current</div>
                                                    <div class="options">
                                                        <p>32 A</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Maximum power</div>
                                                    <div class="options">
                                                        <div class="list">
                                                            <div>7 kWt /<span>Type 1 j1772</span></div>
                                                            <div>22 kWt /<span>Mennekes Type 2</span></div>
                                                            <div>22 kWt /<span>GB/T-AC</span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title d-lg-none">RFID</div>
                                                    <div class="options">
                                                        <img src="assets/img/rfid.svg" alt="" />
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Protocol</div>
                                                    <div class="options">
                                                        <p>OCPP 1.6/2.0</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-with-image">
        <div class="row g-0">
            <div class="col-md-6">
                <div class="image">
                    <img class="lazy" data-src="assets/img/img03.jpg" srcset="assets/img/img03.jpg 1x, assets/img/img03@2x.jpg 2x" alt="" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-wrapper">
                    <div class="text">
                        <h2>Do It Like a Pro</h2>
                        <p>Connect every smart NOIR to your billing system with OCPP 1.6/2.0 protocols and build your own network all around the world, generating additional revenue from exploiting it</p>
                        <p>We recommend</p>
                        <figure>
                            <img src="assets/img/logo-ecofactor.svg" alt="" />
                        </figure>
                        <div class="buttons">
                            <a href="#"><img src="assets/img/app-store.svg" alt="" /></a>
                            <a href="#"><img src="assets/img/google-play.svg" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-with-image text-with-image--reverse">
        <div class="row flex-md-row-reverse g-0">
            <div class="col-md-6">
                <div class="image">
                    <img class="lazy" data-src="assets/img/img04.jpg" srcset="assets/img/img04.jpg 1x, assets/img/img04@2x.jpg 2x" alt="" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-wrapper">
                    <div class="text">
                        <div class="contact-list">
                            <h2>Contact us</h2>
                            <ul>
                                <li>
                                    <div class="text">
                                        <a href="#">
                                            <strong>Kyiv</strong>
                                            <p>
                                                Yevhen Konovalets st., 36D<br />
                                                Kyiv, Ukraine 01133
                                            </p>
                                        </a>
                                    </div>
                                    <div class="link">
                                        <a href="#" class="btn-more">See on map</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <a href="tel:">
                                            <strong>+38 095 200 7 002</strong>
                                            <p>Support 24/7</p>
                                        </a>
                                    </div>
                                    <div class="link">
                                        <a href="tel:" class="btn-more">Call number</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <a href="tel:">
                                            <strong>+38 095 13 000 13</strong>
                                            <p>For investors</p>
                                        </a>
                                    </div>
                                    <div class="link">
                                        <a href="tel:" class="btn-more">Call number</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <a href="tel:">
                                            <strong>+38 095 43 000 43</strong>
                                        </a>
                                    </div>
                                    <div class="link">
                                        <a href="tel:" class="btn-more">Call number</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <a href="tel:">
                                            <strong>+38 099 73 000 73</strong>
                                            <p>Installing charging stations</p>
                                        </a>
                                    </div>
                                    <div class="link">
                                        <a href="tel:" class="btn-more">Call number</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <a href="mailto:CustomerService@ionity.ua">
                                            <strong>CustomerService@ionity.ua</strong>
                                            <p>Email</p>
                                        </a>
                                    </div>
                                    <div class="link">
                                        <a href="tel:" class="btn-more">Write an email</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="block-cta">
        <div class="container-fluid">
            <p>Try modern, quality <br />and convenience <br />from <strong>Ukraine</strong> <img src="assets/img/flag-square.svg" alt="" /></p>
            <a href="#" class="btn btn-light">PReorder</a>
        </div>
    </div>

<?php get_footer();
