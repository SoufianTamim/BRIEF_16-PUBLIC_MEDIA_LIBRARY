<?php
function now()
{
    return date("Y-m-d H:i:s");
}
function nowPlus24h()
{
    return date("Y-m-d H:i:s", strtotime('+24 hours'));
} ?>