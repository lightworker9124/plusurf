<?php include("header.php"); ?>
<?php include("menu.php"); ?>
<div id="Add_Website" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div  style="padding: 1em 0 0 0; " class="modal-content wrapper" >
            <div class="modal-header">
                <div type="button" class="close" data-dismiss="modal">&times;</div>
                <h4 class="modal-title"><?php _l("add_website"); ?> <i class="icon fa-globe" ></i></h4>
            </div>
            <form id="website_form" action="<?php _router("websites"); ?>" method="post" >
                <div class="modal-body uniform">
                    <div class="form-group">
                        <label class="control-label" for="inputDefault"><?php _l("web_address"); ?></label>
                        <input class="form-control" name="website_url" placeholder="<?php _l("web_example_url"); ?>" id="inputDefault" type="text" required>
                    </div>
                    <hr>
                    <div class="form-group">
                       
                        <input type="hidden"  name="website_seconds" value="6" />
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="inputDefault"><?php _l("max_per_hour");?></label>
                        <input type="text" id="website_hour_max" name="website_hour_max" value="" />
                    </div>
                    <hr>
                    <div id="disabled_content_inside" >
                        <div class="form-group">
                            <label class="control-label"><?php _l("traffic_source"); ?></label>
                            <select  class="control-label" name="source_select" id="source_select" >
                                <?php Template::options(array("noreferer" => l("no_referer"), "custom" => l("custom_referer")), "noreferer"); ?>
                            </select>
                        </div>
                        <div id="website_source_link" style="display: none;"  class="form-group">
                            <label class="control-label" for="inputDefault"><?php _l("web_address"); ?></label>
                            <div>
                                <a href="Javascript::void(0)" onclick="$('#website_source').val('https://www.facebook.com');" class="btn btn-primary" ><i class="fa fa-facebook" ></i></a>
                                <a href="Javascript::void(0)" onclick="$('#website_source').val('https://twitter.com');" class="btn btn-primary" ><i class="fa fa-twitter" ></i></a>
                                <a href="Javascript::void(0)" onclick="$('#website_source').val('https://www.youtube.com');" class="btn btn-primary" ><i class="fa fa-youtube" ></i></a>
                                <a href="Javascript::void(0)" onclick="$('#website_source').val('https://plus.google.com');" class="btn btn-primary" ><i class="fa fa-google-plus" ></i></a>
                                <a href="Javascript::void(0)" onclick="$('#website_source').val('https://www.google.com');" class="btn btn-primary" ><i class="fa fa-search" ></i></a>
                                <a href="Javascript::void(0)" onclick="$('#website_source').val('https://www.linkedin.com');" class="btn btn-primary" ><i class="fa fa-linkedin" ></i></a>
                                <a href="Javascript::void(0)" onclick="$('#website_source').val('http://www.amazon.com');" class="btn btn-primary" ><i class="fa fa-amazon" ></i></a>
                                <a href="Javascript::void(0)" onclick="$('#website_source').val('https://www.reddit.com');" class="btn btn-primary" ><i class="fa fa-reddit" ></i></a>
                                <a href="Javascript::void(0)" onclick="$('#website_source').val('https://vimeo.com');" class="btn btn-primary" ><i class="fa fa-vimeo" ></i></a>
                            </div>
                            <br>
                            <input class="form-control" name="website_source" placeholder="<?php _l("web_example_url"); ?>" id="website_source" type="text" >
                        </div>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php _l("limit_total_hits"); ?></label>
                        <div>
                            <div class="radio">
                                <label>
                                    <input name="website_limit" style="opacity: 100;" id="website_limit1" value="off" checked="" type="radio">
                                    <?php _l("unlimited"); ?>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="website_limit" style="opacity: 100;" id="website_limit2" value="on" type="radio">
                                    <?php _l("limited"); ?>
                                </label>
                                <input type="text" style="width: 150px; display: none;" id="website_total" class="input-sm" name="website_limit_value" value="20" />
                            </div>
                        </div>
                    </div>
                    <div id="disabled_content_inside2" >
                        <hr>
                        <div class="form-group">
                            <label class="control-label" ><?php _l("get_target", "Geo Targeting"); ?></label>
                            <select multiple="multiple" id="gettarget-select" name="geo_target[]">
                                <?php Template::options(s("geotarget/list"), "ALL"); ?>
                            </select>
                        </div>
                    </div>
                    <div id="disabled_content_inside3" >
                        <hr>
                        <div class="form-group" >
                            <label class="control-label" ><?php _l("user_agent", "User Agent"); ?></label>
                            <select class="control-label" name="user_agent" >
                                <?php Template::options(get("useragents"), "all"); ?>
                            </select>
                        </div>
                    </div>
                    <div id="website_alert" ></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" ><?php _l("add"); echo "+"; ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php _l("close"); ?></button>
                </div>
            </form>
        </div>

    </div>
</div>

<div id="Edit_Website" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div  style="padding: 0 0 0 0; " class="modal-content wrapper" >
            <div class="modal-header">
                <div type="button" class="close" data-dismiss="modal">&times;</div>
                <h4 class="modal-title"><?php _l("edit_website"); ?> <i class="icon fa-globe" ></i></h4>
            </div>
            <div id="edit_website_content" ></div>

        </div>

    </div>
</div>

<header>
    <h2><?php _l("my_websites"); ?></h2>
</header>
<section  class="wrapper style5">
    <div class="content container">
        <div style="margin-top: 50px; text-align: <?php echo Languages::text_align(); ?>" >
            <?php _s("ads/header"); ?>
            <div class="row">
                <div class="12u">
                    <ul class="actions">
                        <li><a href="Javascript::void(0)" data-toggle="modal" data-target="#Add_Website" class="btn btn-success" ><?php _l("add_website"); echo " +"; ?></a></li>
                        <li><a href="Javascript::void(0)" class="btn btn-default" ><?php _get("websites_count"); ?> / <?php _u("website_slots"); ?></a></li>
                    </ul>
                </div>
            </div>

            <div style="text-align: <?php echo Languages::text_align(); ?>" class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="on-desktop no-phone no-tablet" ><?php _l("hits"); ?></th>
                        <th><?php _l("status"); ?></th>
                        <th><?php _l("web_address"); ?></th>
                        <th><?php _l("edit"); ?></th>
                        <th><?php _l("run"); ?></th>
                        <th><?php _l("delete"); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $websites = get("websites");
                    if(!empty($websites))
                    {
                        foreach($websites as $website)
                        {
                            ?>
                            <tr id="website_<?php echo $website["id"]; ?>" >
                                <td class="on-desktop no-phone no-tablet" > <a href="#website_<?php echo $website["id"]; ?>"  data-original-title="<?php echo $website["hits"]." ".l("hits"); ?>" class="tip-top"  ><i class="icon fa-eye" ></i></a></td>
                                <td>
                                    <?php if($website["activated"]=="1") { ?>
                                        <a href="#website_<?php echo $website["id"]; ?>"  data-original-title="<?php _l("confirmed"); ?>" class="tip-top" ><i class="icon fa-check" ></i></a>
                                    <?php } else { ?>
                                        <a href="#website_<?php echo $website["id"]; ?>"  data-original-title="<?php _l("pending"); ?>" class="tip-top" ><i class="icon fa-clock-o" ></i></a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a class="btn btn-info no-desktop on-phone on-tablet" style="text-decoration: none;" target="_blank" href="<?php echo $website["url"]; ?>" ><i class="icon fa-share" ></i></a>
                                    <a class="on-desktop no-phone no-tablet" target="_blank" style="text-decoration: none;" href="<?php echo $website["url"]; ?>" ><?php echo Sys::split($website["url"], 20); ?></a>
                                </td>
                                <td><a class="btn btn-success" onclick="edit_website(<?php echo $website["id"]; ?>, '<?php _router("websites"); ?>')" href="Javascript::void(0)" ><i class="icon fa-pencil" ></i></a></td>
                                <td><a class="btn btn-primary" onclick="run_website(<?php echo $website["id"]; ?>, '<?php _router("websites"); ?>', 'run_<?php echo $website["id"]; ?>')" href="Javascript::void(0)" ><i id="run_<?php echo $website["id"]; ?>" class="icon <?php if($website["enabled"]=="1") { echo "fa-pause"; } else { echo "fa-play";} ?>" ></i></a></td>
                                <td><a class="btn btn-danger" onclick="delete_website(<?php echo $website["id"]; ?>, '<?php _router("websites"); ?>', 'website_<?php echo $website["id"]; ?>')" href="Javascript::void(0)" ><i class="icon fa-trash" ></i></a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <ul class="pagination" >
                <?php _get("pagination"); ?>
            </ul>
            <?php _s("ads/footer"); ?>
        </div>
    </div>
</section>
<?php include("footer.php"); ?>
