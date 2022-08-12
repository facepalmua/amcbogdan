<?php
$config = array(
    'allowed_html' => array(
        'a' => array('href' => true),
        'p' => array(),
        'b' => array(),
        'strong' => array(),
        'img' => array('src'=>true),
        'ol' => array(),
        'blockquote' => array(),
        'li' => array(),
        'ul' => array(),
        'h2' => array(),
        'h3' => array(),
        'h4' => array(),
        'h5' => array(),
        'h6' => array(),

    ),
    'html_replace' =>  array(
//        '<p>' => '<p style="Margin-top: 0;color: #353638;font-weight: 400;font-size: 17px;font-family: Georgia,serif;line-height: 27px;Margin-bottom: 27px">',
//        '<b>' => '<strong style="font-weight: bold">',
//        '</b>' => '</strong>',
//        '<strong>' => '<strong style="font-weight: bold">',
//        '<ol>' => '<table class="contents" style="border-collapse: collapse;border-spacing: 0;width: 100%">
//						<tbody>
//							<tr>
//								<td class="padded" style="padding: 0;vertical-align: top;padding-left: 20px;padding-right: 20px">
//									<ol style="Margin-top: 0;padding-left: 0;color: #353638;font-weight: 400;font-size: 13px;Margin-left: 18px;font-family: Georgia,serif;line-height: 21px;Margin-bottom: 21px">',
//        '</ol>' => '</ol></td></tr></tbody></table>',
//        '<li>' => '<li style="Margin-top: 0;padding-left: 6px;Margin-bottom: 10px">',
//        '<ul>' => '<table class="contents" style="border-collapse: collapse;border-spacing: 0;width: 100%">
//					<tbody>
//						<tr>
//							<td class="padded" style="padding: 0;vertical-align: top;padding-left: 20px;padding-right: 20px">
//								<ul style="Margin-top: 0;padding-left: 0;color: #353638;font-weight: 400;font-size: 13px;Margin-left: 16px;font-family: Georgia,serif;line-height: 21px;Margin-bottom: 21px">',
//        '</ul>' => '</ul></td></tr></tbody></table>',
//        '<blockquote>' => '<blockquote style="Margin-top: 0;Margin-right: 0;Margin-bottom: 0;padding-right: 0;border-left: 4px solid #cbcbcb;font-style: italic;Margin-left: 0;padding-left: 17px">
//							<p style="Margin-top: 0;color: #353638;font-weight: 400;font-size: 17px;font-family: Georgia,serif;line-height: 27px;Margin-bottom: 27px">',
//        '</blockquote>' => '</p></blockquote>'
    ),
    'html_preg' => array(
        //'/<a href="([^"]*)">/' => '<a href="$1" data-emb-href-display="link" style="text-decoration: underline;transition: color .2s;color: #289fd8">'
    )
);