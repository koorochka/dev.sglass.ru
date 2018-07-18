<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<!--Blog Detail -->
<section class="no-padding">
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area  col-md-9 no-padding-right padding-bottom-70">
                <main id="main" class="site-main padding-top-50" >
                    <h1><?=$arResult["NAME"]?></h1>
                    <div class="latest-news-data">
                        <span class="tags"><a href="#">Financial</a>, <a href="#"> Maketing</a></span>
                        <span class="dates"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
                    </div>
                    <div class="lastest-news-detail">

                        <?if(is_array($arResult["DETAIL_PICTURE"])):?>
                            <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                                 class="img-responsive"
                                 title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
                                 alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>">
                        <?else:?>
                            <img src="<?=$templateFolder?>/images/default.jpg"
                                 class="img-responsive"
                                 alt="Image">
                        <?endif;?>

                        <h4>Context of Business</h4>
                        <p>Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat id. Vivamus interdum urna at sapien varius elementum. Suspendisse ut mi felis et interdum libero lacinia vel. Aenean elementum odio ut lorem cursus, eu auctor magna pellentesque.  Cras facilisis quam sed rhoncus dapibus. Quisque lorem enim, dictum at magna eu, hendrerit hendrerit arcu. Etiam vulputate ac tortor ac gravida. Proin accumsan placerat rutrum. Praesent ut eros ac nisi ultrices rhoncus et nec nunc</p>
                        <br>
                        <p>Nulla fermentum eros vitae est finibus dapibus. Aliquam porta nulla a elit varius efficitur. In in magna sed turpis venenatis tristique eu eget neque. Duis condimentum libero ornare quam tincidunt interdum. Phasellus porttitor nisi ut lectus pellentesque, ut fringilla leo convallis. </p>
                        <br>
                        <blockquote>
                            <p>Wullam placerat vehicula pulvinar. Nam convallis euismod maximus. Suspendisse dignissim, ante at posuere cursus, diam nisl viverra felis, vel malesuada ex ante ac urna.</p>
                            <strong>CHERYL CRUZ</strong>
                        </blockquote>
                        <br>
                        <p>Duis gravida tempus imperdiet. Vivamus elit vel consequat elementum. Cras consequat lorem non orci sagittis, eget volutpat neque imperdiet. Nam auctor nisi vitae enim accumsan, ac dignissim tortor consequat.</p>
                        <ul class="style-list-circle">
                            <li><a href="#">Nullam consequat lacus non luctus finibus.</a></li>
                            <li><a href="#">Interdum et malesuada fames ac ante</a></li>
                            <li><a href="#">Nam justo ipsum, sagittis sed hendrerit ac</a></li>
                            <li><a href="#">Interdum et malesuada fames ac ante</a></li>
                            <li><a href="#">Nam justo ipsum, sagittis sed hendrerit ac</a></li>
                        </ul>
                    </div>
                    <div class="footer-detail-blog">
                        <div class="tags-bottom">
                            <p>TAGES&nbsp;: &nbsp;<a href=""> Construction</a>,&nbsp; <a href="">Architect</a>,&nbsp; <a href="">House</a> ,&nbsp; <a href="">Building</a></p>
                        </div>
                        <div class="share-bottom">
                            <p>SHARE&nbsp;: &nbsp;<a href=""> Facebook</a>,&nbsp; <a href="">Twitter</a>,&nbsp; <a href="">Google+</a></p>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="entry_post_navigation">
                        <div class="preview_entry_post">
                            <a href="#">
                                <span><i class="fa fa-angle-double-left" aria-hidden="true"></i>  PREVIEW</span>
                                <h3>Plans for growing businesses</h3>
                            </a>

                        </div>
                        <div class="next_entry_post">
                            <a href="#">
                                <span>NEXT <i class="fa fa-angle-double-right" aria-hidden="true"></i>  </span>
                                <h3>Help you planning for your retirement</h3>
                            </a>

                        </div>
                    </div><!-- End entry Post Navigation -->
                    <div class="line"></div>
                    <div id="comments" class="comments-area">

                        <h2 class="comments-title">3 Comments</h2>
                        <ol class="comment-list">
                            <li class="comment" >
                                <div class="comment-body">
                                    <div class="comment-meta">
                                        <div class="comment-author vcard">
                                            <a href="#"><img alt="" src="<?=$templateFolder?>/images/mem1.jpg" class="avatar photo avatar-default"></a>
                                        </div>

                                    </div>
                                    <div class="comment-content">

                                        <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
                                        <cite class="fn"><a href="" rel="external nofollow" class="url">Angela Allen</a></cite>  -
                                        <a href="" class="comment-date">
                                            <span>March 30, 2016</span>
                                        </a>
                                        <div class="reply">
                                            <a rel="nofollow" class="comment-reply-link" href="" onclick="" aria-label=""><i class="fa fa-share" aria-hidden="true"></i>   Reply</a>
                                        </div>
                                    </div>
                                </div><!-- End comment body -->

                                <ol class="children last-comment">
                                    <li class="comment" >
                                        <div class="comment-body">
                                            <div class="comment-meta commentmetadata">
                                                <div class="comment-author vcard">
                                                    <img alt="" src="<?=$templateFolder?>/images/mem2.jpg" class="avatar photo avatar-default">
                                                </div>

                                            </div>
                                            <div class="comment-content">

                                                <p>Nullam ipsum urna, dapibus sed justo sed, imperdiet malesuada commodo, eros eleifend laoreet fringilla,</p>
                                                <cite class="fn"><a href="" rel="external nofollow" class="url">Angela Allen</a></cite>  -
                                                <a href="" class="comment-date">
                                                    <span>March 30, 2016</span>
                                                </a>
                                            </div>
                                        </div><!-- End comment body -->
                                    </li><!-- #comment-## -->
                                </ol><!-- .children -->
                            </li>
                            <li class="comment last-comment" >
                                <div class="comment-body">
                                    <div class="comment-meta commentmetadata">
                                        <div class="comment-author vcard">
                                            <img alt="" src="<?=$templateFolder?>/images/mem1.jpg" class="avatar photo avatar-default">
                                        </div>

                                    </div>
                                    <div class="comment-content">

                                        <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
                                        <cite class="fn"><a href="" rel="external nofollow" class="url">Angela Allen</a></cite>  -
                                        <a href="" class="comment-date">
                                            <span>March 30, 2016</span>
                                        </a>
                                        <div class="reply">
                                            <a rel="nofollow" class="comment-reply-link" href="" onclick="" aria-label=""><i class="fa fa-share" aria-hidden="true"></i>   Reply</a>
                                        </div>
                                    </div>
                                </div><!-- End comment body -->
                            </li>
                        </ol>
                    </div><!-- Comments Area -->

                    <div id="respond" class="comment-respond">
                        <h3 id="reply-title" class="comment-reply-title">Leave a Reply </h3>
                        <form action="GET" method="post" id="commentform" class="comment-form form-inline" novalidate="">
                            <p class="logged-in-as"><a href="#" aria-label="You must be logged in to post a comment.">You must be logged in to post a comment.</a>. </p>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6 padding-right-10">
                                    <label class="sr-only" for="inputName">Password</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Your Name">
                                </div>
                                <div class="form-group col-sm-12 col-md-6 padding-left-10">
                                    <label class="sr-only" for="inputEmail">Email address</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Your Email">
                                </div>
                                <div class="form-group col-xs-12">
                                    <textarea id="textarea" class="form-control" rows="5" required="required"></textarea>
                                </div>
                            </div><!-- End row -->
                            <p class="form-submit">
                                <button name="submit" id="submit" class="ot-btn btn-main-color large-btn btn-rounded btn-submit" type="submit">Comment </button>
                            </p>
                        </form>
                    </div>
                </main>
            </div> <!-- End Col -->

            <div id="secondary" class="widget-area  col-md-3 padding-top-50" role="complementary">
                <aside class="widget widget_text">
                    <h3 class="widget-title">About</h3>
                    <div class="textwidget">
                        <p>Nulla eleifend, sapien eget porttitor maximus, nisl ante convallis dolor, nec consequat felis ex a ex. Vestibulum, vitae fringilla nibh consectetur. Integer at volutpat augue.
                        </p>
                    </div>
                </aside>

                <aside class="widget widget_search">
                    <form action="GET" class="search-form" method="get" role="search">
                        <input name="s" value="" placeholder="Search …" class="search-field" type="search">
                        <button class="search-submit" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </aside>
                <aside id="categories-2" class="widget widget_categories">
                    <h3 class="widget-title" >Categories</h3>

                    <ul>
                        <li><a href="#">Business Market</a></li>
                        <li><a href="#">Socials Network</a></li>
                        <li><a href="#">Team Work</a></li>
                        <li><a href="#">Rebuild Services</a></li>
                        <li><a href="#">Electrical System</a></li>
                    </ul> <!-- End Ul -->
                </aside>

                <aside class="promotion clearboth">
                    <img src="images/Blog/promotion.jpg" class="img-responsive" alt="Image">
                    <div class="promotionText">
                        <p>Amazing Theme! You can customize it very easy to fit your needs.</p>
                        <a href="" class="btn btn-buy-now"> Buy Now</a>
                    </div>
                </aside><!-- End promotion -->

                <aside class="widget widget_Archive">
                    <h3 class="widget-title">Archive</h3>
                    <ul>
                        <li><a href="#">March 2016</a>
                            <span class="count">(4)</span>
                        </li>
                        <li><a href="#">Febuary 2016</a>
                            <span class="count">(9)</span>

                        </li>
                        <li><a href="#">January 2016</a>
                            <span class="count">(34)</span>

                        </li>
                        <li><a href="#">December 2015</a>
                            <span class="count">(22)</span>

                        </li>
                        <li><a href="#">November 2015</a>
                            <span class="count">(35)</span>

                        </li>
                        <li><a href="#">Octorber 2015</a>
                            <span class="count">(4)</span>

                        </li>
                        <li><a href="#">September 2015</a>
                            <span class="count">(26)</span>

                        </li>
                        <li><a href="#">August</a>
                            <span class="count">(11)</span>

                        </li>
                    </ul> <!-- End Ul -->
                </aside>

                <aside class="widget widget_tag_cloud">
                    <h3 class="widget-title">Tags</h3>
                    <div class="tagcloud">
                        <a href="#">audio</a>
                        <a href="#">gallery</a>
                        <a href="#">image</a>
                        <a href="#">music</a>
                        <a href="#">photo</a>
                        <a href="#">quote</a>
                        <a href="#">text</a>
                        <a href="#">video</a>
                        <a href="#">vimeo</a>
                        <a href="#">youtube</a>
                    </div>
                </aside>

                <aside class="widget widget_meta">
                    <h3 class="widget-title">Meta</h3>
                    <ul>
                        <li><a href="#">Site Admin</a></li>
                        <li><a href="#">Log out</a></li>
                        <li><a href="#">Entries <abbr>RSS</abbr></a></li>
                        <li><a href="#">Comments <abbr>RSS</abbr></a></li>
                        <li><a href="#">WordPress.org</a></li>
                    </ul>
                </aside>
            </div>
        </div><!-- End Row -->

    </div><!-- End container -->
</section><!--  End Section -->