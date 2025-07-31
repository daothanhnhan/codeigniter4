<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>Nestable</title>
    <link rel="stylesheet" type="text/css" href="/admin/dist/css/nestable.css">
</head>
<body>
<!-- https://dbushell.github.io/Nestable/ -->
    <h1>Nestable</h1>

    <p>Drag &amp; drop hierarchical list with mouse and touch compatibility (jQuery plugin)</p>

    <p><strong><a href="https://github.com/dbushell/Nestable">Download on GitHub</a></strong></p>

    <div class="cf">
    <a href="http://twitter.com/share" class="socialite twitter-share" data-via="dbushell" data-text="jQuery Nestable plugin" data-url="http://dbushell.github.com/Nestable/" data-size="large" rel="nofollow" target="_blank">
        <span class="vhidden">Share on Twitter</span>
    </a>
    </div>


<p><strong>PLEASE NOTE: I cannot provide any support or guidance beyond this README. If this code helps you that's great but I have no plans to develop Nestable beyond this demo (it's not a final product and has limited functionality). I cannot reply to any requests for help.</strong></p>

    
    <menu id="nestable-menu">
        <button type="button" data-action="expand-all">Expand All</button>
        <button type="button" data-action="collapse-all">Collapse All</button>
    </menu>
    

    <p>&nbsp;</p>

    <div class="cf nestable-lists">

    <p><strong>Draggable Handles</strong></p>

    <p>If you're clever with your CSS and markup this can be achieved without any JavaScript changes.</p>

        <div class="dd" id="nestable3">
            <ol class="dd-list">
                <li class="dd-item dd3-item" data-id="13">
                    <div class="dd-handle dd3-handle"></div><div class="dd3-content"><a href="/tuan">Item 13</a></div>
                </li>
                <li class="dd-item dd3-item" data-id="14">
                    <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 14</div>
                </li>
                <li class="dd-item dd3-item" data-id="15">
                    <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 15</div>
                    <ol class="dd-list">
                        <li class="dd-item dd3-item" data-id="16">
                            <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 16</div>
                        </li>
                        <li class="dd-item dd3-item" data-id="17">
                            <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 17</div>
                        </li>
                        <li class="dd-item dd3-item" data-id="18">
                            <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 18</div>
                        </li>
                    </ol>
                </li>
            </ol>
        </div>

    </div>

    <textarea id="nestable-output"></textarea>

    <p class="small">Copyright &copy; <a href="https://dbushell.com/">David Bushell</a> | Made for <a href="http://www.browserlondon.com/">Browser</a></p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="/admin/dist/js/nestable.js"></script>
<script>

$(document).ready(function()
{

    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

    // $('#nestable3').nestable();
    // // activate Nestable for list 3
    $('#nestable3').nestable({
        // group: 1
    })
    .on('change', updateOutput);

    // // output initial serialised data
    updateOutput($('#nestable3').data('output', $('#nestable-output')));

});
</script>
</body>
</html>
