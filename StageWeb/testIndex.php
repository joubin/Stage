<?php
require_once('head.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <meta name="description" content="Bootstrap datetimepicker : Date/time picker widget for Twitter Bootstrap v3" />

    <link rel="stylesheet" type="text/css" media="screen" href="content/site.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="content/pygments-manni.css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">

    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>

    <title>Bootstrap datetimepicker</title>
</head>

<body>
    <div class="container">
        <div class="col-md-3">
            <div class="bs-sidebar hidden-print affix" role="complementary">
            <ul class="nav bs-sidenav">
                <li><a href="#example1">Minimum Setup</a></li>
                <li><a href="#example2">Using Locales</a></li>
                <li><a href="#example3">Available Functions</a></li>
                <li><a href="#example4">Disabling the Date Picker</a></li>
                <li><a href="#example5">Using custom formats</a></li>
                <li><a href="#example6">Using without an icon</a></li>
                <li><a href="#example7">Using with another input-group-addon element</a></li>
                <li><a href="#example8">En/Disabled Dates</a></li>
                <li><a href="#example9">Using Events</a></li>
                <li><a href="#example10">Custom Icons</a></li>
                <li><a href="#options">Options</a></li>
                <li><a href="#events">Events </a></li>
            </ul>
          </div>
        </div>        
        <div class="col-md-9">
            <h1>Bootstrap datetimepicker <small>Date/time picker widget for Twitter Bootstrap v3</small>
            </h1>
            <br />
            <br />            
            <div id="example1">
                <a name="example1"></a>
                <h4>Minimum Setup</h4>

                <div class="container">
                    <div class="row">
                        <div class='col-sm-6'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker1').datetimepicker();
                            });
                        </script>
                    </div>
                </div>
                <h3>Code</h3>

                <div class="highlight highlight-html">
                    <pre>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"container"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"row"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'col-sm-6'</span><span class="nt">&gt;</span>
            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'input-group date'</span> <span class="na">id=</span><span class="s">'datetimepicker1'</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">'text'</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="nt">/&gt;</span>
                    <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"input-group-addon"</span><span class="nt">&gt;&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-calendar"</span><span class="nt">&gt;&lt;/span&gt;</span>
                    <span class="nt">&lt;/span&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
            <span class="nt">&lt;/div&gt;</span>
        <span class="nt">&lt;/div&gt;</span>
        <span class="nt">&lt;script </span><span class="na">type=</span><span class="s">"text/javascript"</span><span class="nt">&gt;</span>
            <span class="nx">$</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker1'</span><span class="p">).</span><span class="nx">datetimepicker</span><span class="p">();</span>
            <span class="p">});</span>
        <span class="nt">&lt;/script&gt;</span>
    <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
</pre>
                </div>
                <hr />
            </div>
           
            <div id="example2">
                <a name="example2"></a>
                <div class="callout-box callout-box-info">
                    Example 2<p>
                        Using Locales. This is same as <a href="#example1">EX 1: Minimum Setup</a> but using the "ru" language option. Note that the language file must be included from the locales folder
                    </p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class='col-sm-6'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker2').datetimepicker({
                                    language: 'ru'
                                });
                            });
                        </script>
                    </div>
                </div>

                <div class="highlight highlight-html">
                    <pre>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"container"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"row"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'col-sm-6'</span><span class="nt">&gt;</span>
            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'input-group date'</span> <span class="na">id=</span><span class="s">'datetimepicker2'</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">'text'</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="nt">/&gt;</span>
                    <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"input-group-addon"</span><span class="nt">&gt;&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-calendar"</span><span class="nt">&gt;&lt;/span&gt;</span>
                    <span class="nt">&lt;/span&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
            <span class="nt">&lt;/div&gt;</span>
        <span class="nt">&lt;/div&gt;</span>
        <span class="nt">&lt;script </span><span class="na">type=</span><span class="s">"text/javascript"</span><span class="nt">&gt;</span>
            <span class="nx">$</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker2'</span><span class="p">).</span><span class="nx">datetimepicker</span><span class="p">({</span>
                    <span class="nx">language</span><span class="o">:</span> <span class="s1">'ru'</span>
                <span class="p">});</span>
            <span class="p">});</span>
        <span class="nt">&lt;/script&gt;</span>
    <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
            </pre>
                </div>
                <hr />
            </div>

            <div id="example3">
                <a name="example3"></a>
                <div class="callout-box callout-box-info">
                    Example 3<p>Available functions. Note that <code>hide</code> is also available.
                    </p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class='col-sm-6'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker3'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-primary" id="setMinDate">setMinDate</button>
                        <button class="btn btn-primary" id="setMaxDate">setMaxDate</button>
                        <button class="btn btn-primary" id="show">show</button>
                        <button class="btn btn-primary" id="disable">disable</button>
                        <button class="btn btn-primary" id="enable">enable</button>
                        <button class="btn btn-primary" id="setDate">setDate</button>
                        <button class="btn btn-primary" id="getDate">getDate</button>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker3').datetimepicker();
                                $("#setMinDate").click(function () {
                                    $('#datetimepicker3').data("DateTimePicker").setMinDate(moment().subtract(14, "d"));
                                });
                                $("#setMaxDate").click(function () {
                                    $('#datetimepicker3').data("DateTimePicker").setMaxDate(moment().add(14, "d"));
                                });
                                $("#show").click(function () {
                                    $('#datetimepicker3').data("DateTimePicker").show();
                                });
                                $("#disable").click(function () {
                                    $('#datetimepicker3').data("DateTimePicker").disable();
                                });
                                $("#enable").click(function () {
                                    $('#datetimepicker3').data("DateTimePicker").enable();
                                });
                                $("#setDate").click(function () {
                                    $('#datetimepicker3').data("DateTimePicker").setDate(moment().startOf("month"));
                                });
                                $("#getDate").click(function () {
                                    alert($('#datetimepicker3').data("DateTimePicker").getDate());
                                });
                            });
                        </script>
                    </div>
                </div>
                <br/>
                <div class="highlight highlight-html">
<pre>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"container"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"row"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'col-sm-6'</span><span class="nt">&gt;</span>
            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'input-group date'</span> <span class="na">id=</span><span class="s">'datetimepicker3'</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">'text'</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="nt">/&gt;</span>
                    <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"input-group-addon"</span><span class="nt">&gt;&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-calendar"</span><span class="nt">&gt;&lt;/span&gt;</span>
                    <span class="nt">&lt;/span&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
            <span class="nt">&lt;/div&gt;</span>
            <span class="nt">&lt;button</span> <span class="na">id=</span><span class="s">"setMinDate"</span><span class="nt">&gt;</span>setMinDate<span class="nt">&lt;/button&gt;</span>
            <span class="nt">&lt;button</span> <span class="na">id=</span><span class="s">"setMaxDate"</span><span class="nt">&gt;</span>setMaxDate<span class="nt">&lt;/button&gt;</span>
            <span class="nt">&lt;button</span> <span class="na">id=</span><span class="s">"show"</span><span class="nt">&gt;</span>show<span class="nt">&lt;/button&gt;</span>
            <span class="nt">&lt;button</span> <span class="na">id=</span><span class="s">"disable"</span><span class="nt">&gt;</span>disable<span class="nt">&lt;/button&gt;</span>
            <span class="nt">&lt;button</span> <span class="na">id=</span><span class="s">"enable"</span><span class="nt">&gt;</span>enable<span class="nt">&lt;/button&gt;</span>
            <span class="nt">&lt;button</span> <span class="na">id=</span><span class="s">"setDate"</span><span class="nt">&gt;</span>setDate<span class="nt">&lt;/button&gt;</span>
            <span class="nt">&lt;button</span> <span class="na">id=</span><span class="s">"getDate"</span><span class="nt">&gt;</span>getDate<span class="nt">&lt;/button&gt;</span>
        <span class="nt">&lt;/div&gt;</span>
        <span class="nt">&lt;script </span><span class="na">type=</span><span class="s">"text/javascript"</span><span class="nt">&gt;</span>
            <span class="nx">$</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker3'</span><span class="p">).</span><span class="nx">datetimepicker</span><span class="p">({</span>
                    <span class="nx">pick12HourFormat</span><span class="o">:</span> <span class="kc">false</span>
                <span class="p">});</span>
                <span class="nx">$</span><span class="p">(</span><span class="s2">"#setMinDate"</span><span class="p">).</span><span class="nx">click</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                    <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker3'</span><span class="p">).</span><span class="nx">data</span><span class="p">(</span><span class="s2">"DateTimePicker"</span><span class="p">).</span><span class="nx">setMinDate</span><span class="p">(</span><span class="k">new</span> <span class="nb">Date</span><span class="p">(</span><span class="s2">"june 12, 2013"</span><span class="p">));</span>
                <span class="p">});</span>                                
                <span class="nx">$</span><span class="p">(</span><span class="s2">"#setMaxDate"</span><span class="p">).</span><span class="nx">click</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                    <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker3'</span><span class="p">).</span><span class="nx">data</span><span class="p">(</span><span class="s2">"DateTimePicker"</span><span class="p">).</span><span class="nx">setMaxDate</span><span class="p">(</span><span class="k">new</span> <span class="nb">Date</span><span class="p">(</span><span class="s2">"july 4, 2013"</span><span class="p">));</span>
                <span class="p">});</span>
                <span class="nx">$</span><span class="p">(</span><span class="s2">"#show"</span><span class="p">).</span><span class="nx">click</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                    <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker3'</span><span class="p">).</span><span class="nx">data</span><span class="p">(</span><span class="s2">"DateTimePicker"</span><span class="p">).</span><span class="nx">show</span><span class="p">();</span>
                <span class="p">});</span>
                <span class="nx">$</span><span class="p">(</span><span class="s2">"#disable"</span><span class="p">).</span><span class="nx">click</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                    <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker3'</span><span class="p">).</span><span class="nx">data</span><span class="p">(</span><span class="s2">"DateTimePicker"</span><span class="p">).</span><span class="nx">disable</span><span class="p">();</span>
                <span class="p">});</span>
                <span class="nx">$</span><span class="p">(</span><span class="s2">"#enable"</span><span class="p">).</span><span class="nx">click</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                    <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker3'</span><span class="p">).</span><span class="nx">data</span><span class="p">(</span><span class="s2">"DateTimePicker"</span><span class="p">).</span><span class="nx">enable</span><span class="p">();</span>
                <span class="p">});</span>
                <span class="nx">$</span><span class="p">(</span><span class="s2">"#setDate"</span><span class="p">).</span><span class="nx">click</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                    <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker3'</span><span class="p">).</span><span class="nx">data</span><span class="p">(</span><span class="s2">"DateTimePicker"</span><span class="p">).</span><span class="nx">setDate</span><span class="p">(</span><span class="s2">"10/23/2013"</span><span class="p">);</span>
                <span class="p">});</span>
                <span class="nx">$</span><span class="p">(</span><span class="s2">"#getDate"</span><span class="p">).</span><span class="nx">click</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                    <span class="nx">alert</span><span class="p">(</span><span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker3'</span><span class="p">).</span><span class="nx">data</span><span class="p">(</span><span class="s2">"DateTimePicker"</span><span class="p">).</span><span class="nx">getDate</span><span class="p">());</span>
                <span class="p">});</span>
            <span class="p">});</span>
        <span class="nt">&lt;/script&gt;</span>
    <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
</pre>
                </div>
                <hr />
            </div>

            <div id="example4">
                <a name="example4"></a>
                <div class="callout-box callout-box-info">
                    Example 4<p>
                        Disable the date picker
                    </p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class='col-sm-6'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker4'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker4').datetimepicker({
                                    pickDate: false
                                });
                            });
                        </script>
                    </div>
                </div>

                <div class="highlight highlight-html">
                    <pre>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"container"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"row"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'col-sm-6'</span><span class="nt">&gt;</span>
            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'input-group date'</span> <span class="na">id=</span><span class="s">'datetimepicker4'</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">'text'</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="nt">/&gt;</span>
                    <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"input-group-addon"</span><span class="nt">&gt;&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-time"</span><span class="nt">&gt;&lt;/span&gt;</span>
                    <span class="nt">&lt;/span&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
            <span class="nt">&lt;/div&gt;</span>
        <span class="nt">&lt;/div&gt;</span>
        <span class="nt">&lt;script </span><span class="na">type=</span><span class="s">"text/javascript"</span><span class="nt">&gt;</span>
            <span class="nx">$</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker4'</span><span class="p">).</span><span class="nx">datetimepicker</span><span class="p">({</span>
                    <span class="nx">pickDate</span><span class="o">:</span> <span class="kc">false</span>
                <span class="p">});</span>
            <span class="p">});</span>
        <span class="nt">&lt;/script&gt;</span>
    <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
            </pre>
                </div>
                <hr />
            </div>

            <div id="example5">
                <a name="example5"></a>
                <div class="callout-box callout-box-info">
                    Example 5<p>
                       Disable the time picker and use a custom date format <code>data-date-format="YYYY/MM/DD"</code>. (US default is <code>MM/DD/YYYY hh:mm A/PM</code>)
                    </p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class='col-sm-6'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker5'>
                                    <input type='text' class="form-control" data-date-format="YYYY/MM/DD"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker5').datetimepicker({
                                    pickTime: false
                                });
                            });
                        </script>
                    </div>
                </div>

                <div class="highlight highlight-html">
<pre>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"container"</span><span class="nt">&gt;</span>
	<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"row"</span><span class="nt">&gt;</span>
		<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'col-sm-6'</span><span class="nt">&gt;</span>
			<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
				<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'input-group date'</span> <span class="na">id=</span><span class="s">'datetimepicker5'</span><span class="nt">&gt;</span>
					<span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">'text'</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">data-date-format=</span><span class="s">"YYYY/MM/DD"</span><span class="nt">/&gt;</span>
					<span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"input-group-addon"</span><span class="nt">&gt;</span>
						<span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-calendar"</span><span class="nt">&gt;&lt;/span&gt;</span>
					<span class="nt">&lt;/span&gt;</span>
				<span class="nt">&lt;/div&gt;</span>
			<span class="nt">&lt;/div&gt;</span>
		<span class="nt">&lt;/div&gt;</span>
		<span class="nt">&lt;script </span><span class="na">type=</span><span class="s">"text/javascript"</span><span class="nt">&gt;</span>
			<span class="nx">$</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
				<span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker5'</span><span class="p">).</span><span class="nx">datetimepicker</span><span class="p">({</span>
					<span class="nx">pickTime</span><span class="o">:</span> <span class="kc">false</span>
				<span class="p">});</span>
			<span class="p">});</span>
		<span class="nt">&lt;/script&gt;</span>
	<span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
</pre>
                </div>
                <hr />
            </div>

            <div id="example6">
                <a name="example6"></a>
                <div class="callout-box callout-box-info">
                    Example 6<p>
                       Usage without an icon.
                    </p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class='col-sm-6'>
                            <input type='text' class="form-control" id='datetimepicker6'/>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker6').datetimepicker();
                            });
                        </script>
                    </div>
                </div>
                <br/>
                <div class="highlight highlight-html">
                    <pre><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"container"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"row"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'col-sm-6'</span><span class="nt">&gt;</span>
            <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">'text'</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">id=</span><span class="s">'datetimepicker6'</span><span class="nt">/&gt;</span>
        <span class="nt">&lt;/div&gt;</span>
        <span class="nt">&lt;script </span><span class="na">type=</span><span class="s">"text/javascript"</span><span class="nt">&gt;</span>
            <span class="nx">$</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker6'</span><span class="p">).</span><span class="nx">datetimepicker</span><span class="p">();</span>
            <span class="p">});</span>
        <span class="nt">&lt;/script&gt;</span>
    <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
</pre>
                </div>
                <hr />
            </div>
            
            <div id="example7">
                <a name="example7"></a>
                <div class="callout-box callout-box-info">
                    Example 7<p>
                       Using with another input-group-addon element
                    </p>
                    <p>Note that we put a datepickerbutton class on the input-group-addon element that we want to trigger the datetimepicker widget</p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class='col-sm-6'>
                            <div class="input-group" id="datetimepicker7">
                                <span class="input-group-addon datepickerbutton">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                <input type='text' class="form-control"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </span>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker7').datetimepicker();
                            });
                        </script>
                    </div>
                </div>
                <br/>
                <div class="highlight highlight-html">
<pre><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"input-group"</span> <span class="na">id=</span><span class="s">"datetimepicker7"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"input-group-addon datepickerbutton"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-calendar"</span><span class="nt">&gt;&lt;/span&gt;</span>
    <span class="nt">&lt;/span&gt;</span>
    <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">'text'</span> <span class="na">class=</span><span class="s">"form-control"</span><span class="nt">/&gt;</span>
    <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"input-group-addon"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-remove"</span><span class="nt">&gt;&lt;/span&gt;</span>
    <span class="nt">&lt;/span&gt;</span>
<span class="nt">&lt;/div&gt;</span>
</pre>
                </div>
                <hr />
            </div>
            
            <div id="example8">
                <a name="example8"></a>
                <div class="callout-box callout-box-info">
                    Example 8 <p>En/Disabled Dates. Both are mutually exclusive and expect an array. Disabled dates might be used for holidays. Enabled dates might be used for available dates for a reservation.</p>
                </div>

                <div class="container">
                    <div class="row">
                       <div class='col-sm-6'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker8'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker8').datetimepicker({
                                    defaultDate: "11/1/2013",
                                    disabledDates: [
                                        moment("12/25/2013"),
                                        new Date(2013, 11 - 1, 21),
                                        "11/22/2013 00:53"
                                    ]
                                });
                            });
                        </script>
                    </div>
                </div>

                <div class="highlight highlight-html">
                    <pre>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"container"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"row"</span><span class="nt">&gt;</span>
       <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'col-sm-6'</span><span class="nt">&gt;</span>
            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'input-group date'</span> <span class="na">id=</span><span class="s">'datetimepicker7'</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">'text'</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="nt">/&gt;</span>
                    <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"input-group-addon"</span><span class="nt">&gt;&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-calendar"</span><span class="nt">&gt;&lt;/span&gt;</span>
                    <span class="nt">&lt;/span&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
            <span class="nt">&lt;/div&gt;</span>
        <span class="nt">&lt;/div&gt;</span>
        <span class="nt">&lt;script </span><span class="na">type=</span><span class="s">"text/javascript"</span><span class="nt">&gt;</span>
            <span class="nx">$</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker7'</span><span class="p">).</span><span class="nx">datetimepicker</span><span class="p">({</span>
                    <span class="nx">defaultDate</span><span class="o">:</span> <span class="s2">"11/1/2013"</span><span class="p">,</span>
                    <span class="nx">disabledDates</span><span class="o">:</span> <span class="p">[</span>
                        <span class="nx">moment</span><span class="p">(</span><span class="s2">"12/25/2013"</span><span class="p">),</span>
                        <span class="k">new</span> <span class="nb">Date</span><span class="p">(</span><span class="mi">2013</span><span class="p">,</span> <span class="mi">11</span> <span class="o">-</span> <span class="mi">1</span><span class="p">,</span> <span class="mi">21</span><span class="p">),</span>
                        <span class="s2">"11/22/2013 00:53"</span>
                    <span class="p">]</span>
                <span class="p">});</span>
            <span class="p">});</span>
        <span class="nt">&lt;/script&gt;</span>
    <span class="nt">&lt;/div&gt;</span>
<span class="nt">&lt;/div&gt;</span>
</pre>
                </div>
            <hr />
            </div>
            
            <div id="example9">
                <a name="example9"></a>
                <div class="callout-box callout-box-info">
                    Example 9 <p>Events and linked pickers</p>
                </div>

                <div class="container">
                    <div class="col-sm-6" style="height:75px;">
                       <div class='col-md-5'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker9'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-5'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker10'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker9').datetimepicker();
                                $('#datetimepicker10').datetimepicker();
                                $("#datetimepicker9").on("dp.change",function (e) {
                                   $('#datetimepicker10').data("DateTimePicker").setMinDate(e.date);
                                });
                                $("#datetimepicker10").on("dp.change",function (e) {
                                   $('#datetimepicker9').data("DateTimePicker").setMaxDate(e.date);
                                });
                            });
                        </script>
                </div>

                <div class="highlight highlight-html">
                    <pre>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"container"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-sm-6"</span> <span class="na">style=</span><span class="s">"height:75px;"</span><span class="nt">&gt;</span>
       <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'col-md-5'</span><span class="nt">&gt;</span>
            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'input-group date'</span> <span class="na">id=</span><span class="s">'datetimepicker9'</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">'text'</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="nt">/&gt;</span>
                    <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"input-group-addon"</span><span class="nt">&gt;&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-calendar"</span><span class="nt">&gt;&lt;/span&gt;</span>
                    <span class="nt">&lt;/span&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
            <span class="nt">&lt;/div&gt;</span>
        <span class="nt">&lt;/div&gt;</span>
        <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'col-md-5'</span><span class="nt">&gt;</span>
            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'input-group date'</span> <span class="na">id=</span><span class="s">'datetimepicker10'</span><span class="nt">&gt;</span>
                    <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">'text'</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="nt">/&gt;</span>
                    <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"input-group-addon"</span><span class="nt">&gt;&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-calendar"</span><span class="nt">&gt;&lt;/span&gt;</span>
                    <span class="nt">&lt;/span&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
            <span class="nt">&lt;/div&gt;</span>
        <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;script </span><span class="na">type=</span><span class="s">"text/javascript"</span><span class="nt">&gt;</span>
        <span class="nx">$</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
            <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker9'</span><span class="p">).</span><span class="nx">datetimepicker</span><span class="p">();</span>
            <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker10'</span><span class="p">).</span><span class="nx">datetimepicker</span><span class="p">();</span>
            <span class="nx">$</span><span class="p">(</span><span class="s2">"#datetimepicker9"</span><span class="p">).</span><span class="nx">on</span><span class="p">(</span><span class="s2">"dp.change"</span><span class="p">,</span><span class="kd">function</span> <span class="p">(</span><span class="nx">e</span><span class="p">)</span> <span class="p">{</span>
               <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker10'</span><span class="p">).</span><span class="nx">data</span><span class="p">(</span><span class="s2">"DateTimePicker"</span><span class="p">).</span><span class="nx">setMinDate</span><span class="p">(</span><span class="nx">e</span><span class="p">.</span><span class="nx">date</span><span class="p">);</span>
            <span class="p">});</span>
            <span class="nx">$</span><span class="p">(</span><span class="s2">"#datetimepicker10"</span><span class="p">).</span><span class="nx">on</span><span class="p">(</span><span class="s2">"dp.change"</span><span class="p">,</span><span class="kd">function</span> <span class="p">(</span><span class="nx">e</span><span class="p">)</span> <span class="p">{</span>
               <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker9'</span><span class="p">).</span><span class="nx">data</span><span class="p">(</span><span class="s2">"DateTimePicker"</span><span class="p">).</span><span class="nx">setMaxDate</span><span class="p">(</span><span class="nx">e</span><span class="p">.</span><span class="nx">date</span><span class="p">);</span>
            <span class="p">});</span>
        <span class="p">});</span>
    <span class="nt">&lt;/script&gt;</span>
<span class="nt">&lt;/div&gt;</span>
</pre>
                </div>
                <hr />
            </div>

            <div id="example10">
                <a name="example10"></a>
                <div class="callout-box callout-box-info">
                    Example 10 <p>Custom Icons (e.g. Font Awesome)</p>
                </div>

                <div class="container">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker11'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon"><span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker11').datetimepicker({
                                    icons: {
                                        time: "fa fa-clock-o",
                                        date: "fa fa-calendar",
                                        up: "fa fa-arrow-up",
                                        down: "fa fa-arrow-down"
                                    }
                                });
                            });
                        </script>
                </div>

                <div class="highlight highlight-html">
<pre>
<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"container"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-sm-6"</span> <span class="na">style=</span><span class="s">"height:130px;"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group"</span><span class="nt">&gt;</span>
            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">'input-group date'</span> <span class="na">id=</span><span class="s">'datetimepicker11'</span><span class="nt">&gt;</span>
                <span class="nt">&lt;input</span> <span class="na">type=</span><span class="s">'text'</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="nt">/&gt;</span>
                <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"input-group-addon"</span><span class="nt">&gt;&lt;span</span> <span class="na">class=</span><span class="s">"fa fa-calendar"</span><span class="nt">&gt;</span>
                      <span class="nt">&lt;/span&gt;</span>
                <span class="nt">&lt;/span&gt;</span>
            <span class="nt">&lt;/div&gt;</span>
        <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;script </span><span class="na">type=</span><span class="s">"text/javascript"</span><span class="nt">&gt;</span>
        <span class="nx">$</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
            <span class="nx">$</span><span class="p">(</span><span class="s1">'#datetimepicker10'</span><span class="p">).</span><span class="nx">datetimepicker</span><span class="p">({</span>
                <span class="nx">icons</span><span class="o">:</span> <span class="p">{</span>
                    <span class="nx">time</span><span class="o">:</span> <span class="s2">"fa fa-clock-o"</span><span class="p">,</span>
                    <span class="nx">date</span><span class="o">:</span> <span class="s2">"fa fa-calendar"</span><span class="p">,</span>
                    <span class="nx">up</span><span class="o">:</span> <span class="s2">"fa fa-arrow-up"</span><span class="p">,</span>
                    <span class="nx">down</span><span class="o">:</span> <span class="s2">"fa fa-arrow-down"</span>
                <span class="p">}</span>
            <span class="p">});</span>
        <span class="p">});</span>
    <span class="nt">&lt;/script&gt;</span>
<span class="nt">&lt;/div&gt;</span>
</pre>
                </div>
                <hr />
            </div>

            <div id="options">
                <a name="options"></a>
                <div class="callout-box callout-box-info">
                    Options<p>These options can also be set by <code>data-date-OPTION</code></p>
                </div>
                <div class="highlight highlight-javascript">
                    <pre>
<span class="nx">$</span><span class="p">.</span><span class="nx">fn</span><span class="p">.</span><span class="nx">datetimepicker</span><span class="p">.</span><span class="nx">defaults</span> <span class="o">=</span> <span class="p">{</span>
    <span class="nx">pickDate</span><span class="o">:</span> <span class="kc">true</span><span class="p">,</span>                 <span class="c1">//en/disables the date picker</span>
    <span class="nx">pickTime</span><span class="o">:</span> <span class="kc">true</span><span class="p">,</span>                 <span class="c1">//en/disables the time picker</span>
    <span class="nx">useMinutes</span><span class="o">:</span> <span class="kc">true</span><span class="p">,</span>               <span class="c1">//en/disables the minutes picker</span>
    <span class="nx">useSeconds</span><span class="o">:</span> <span class="kc">true</span><span class="p">,</span>               <span class="c1">//en/disables the seconds picker</span>
    <span class="nx">useCurrent</span><span class="o">:</span> <span class="kc">true</span><span class="p">,</span>               <span class="c1">//when true, picker will set the value to the current date/time </span>    
    <span class="nx">minuteStepping</span><span class="o">:</span><span class="s1">1</span><span class="p">,</span>               <span class="c1">//set the minute stepping</span>
    <span class="nx">minDate</span><span class="o">:</span><span class="s1">`1/1/1900`</span><span class="p">,</span>               <span class="c1">//set a minimum date</span>
    <span class="nx">maxDate</span><span class="o">:</span> <span class="1"></span><span class="p">,</span>     <span class="c1">//set a maximum date (defaults to today +100 years)</span>
    <span class="nx">showToday</span><span class="o">:</span> <span class="kc">true</span><span class="p">,</span>                 <span class="c1">//shows the today indicator</span>
    <span class="nx">language</span><span class="o">:</span><span class="s1">'en'</span><span class="p">,</span>                  <span class="c1">//sets language locale</span>
    <span class="nx">defaultDate</span><span class="o">:</span><span class="s1">""</span><span class="p">,</span>                 <span class="c1">//sets a default date, accepts js dates, strings and moment objects</span>
    <span class="nx">disabledDates</span><span class="o">:</span><span class="p">[]</span><span class="p">,</span>               <span class="c1">//an array of dates that cannot be selected</span>
    <span class="nx">enabledDates</span><span class="o">:</span><span class="p">[]</span><span class="p">,</span>                <span class="c1">//an array of dates that <strong>can</strong> be selected</span>
    <span class="nx">icons</span> <span class="o">=</span> <span class="p">{</span>
        <span class="nx">time</span><span class="o">:</span> <span class="s1">'glyphicon glyphicon-time'</span><span class="p">,</span>
        <span class="nx">date</span><span class="o">:</span> <span class="s1">'glyphicon glyphicon-calendar'</span><span class="p">,</span>
        <span class="nx">up</span><span class="o">:</span>   <span class="s1">'glyphicon glyphicon-chevron-up'</span><span class="p">,</span>
        <span class="nx">down</span><span class="o">:</span> <span class="s1">'glyphicon glyphicon-chevron-down'</span>
    <span class="p">}</span>
    <span class="nx">useStrict</span><span class="o">:</span> <span class="kc">false</span><span class="p">,</span>               <span class="c1">//use "strict" when validating dates</span>  
    <span class="nx">sideBySide</span><span class="o">:</span> <span class="kc">false</span><span class="p">,</span>              <span class="c1">//show the date and time picker side by side</span>
    <span class="nx">daysOfWeekDisabled</span><span class="o">:</span><span class="p">[]</span>          <span class="c1">//for example use daysOfWeekDisabled: [0,6] to disable weekends</span> 
<span class="p">};</span>
</pre>
                </div>
                <hr />
            </div>
            
            <div id="events">
                <a name="events"></a>
                <h4>Events</h4>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">dp.change</h3>
                    </div>
                    <div class="panel-body">
                        Fires when the datepicker changes or updates the date. Note that <code>change</code> may also fire for knockout support.
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">dp.show</h3>
                    </div>
                    <div class="panel-body">
                        Fires when the widget is shown
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">dp.hide</h3>
                    </div>
                    <div class="panel-body">
                        Fires when the widget is hidden
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">dp.error</h3>
                    </div>
                    <div class="panel-body">
                        Fires when Moment cannot parse the date or when the timepicker cannot change because of a `disabledDates` setting. Returns a Moment date object. The specific error can be found be using <code>invalidAt()</code>. For more information see <a href="http://momentjs.com/docs/#/parsing/is-valid/">Moment's docs</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-9">
            <footer class="inner">
                <p class="copyright">
                    <a href="https://github.com/Eonasdan/bootstrap-datetimepicker">Bootstrap-datetimepicker</a>
                    maintained by <a href="https://github.com/Eonasdan">Eonasdan</a>
                </p>
            </footer>
        </div>
    </div>
    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/moment.js"></script>
    <script type="text/javascript" src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="scripts/ru.js"></script>
    <script>
        $(function(){
            var $window = $(window), $body   = $(document.body);
            $body.scrollspy({
                target: '.bs-sidebar'
            });
    });
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47462200-1', 'eonasdan.github.io');
  ga('send', 'pageview');
    </script>
</body>
</html>
