项目说明：通过web端点击按钮，采集端相机拍照采集照片。显现在网页上。
			有用户限制。必须是我的网站成员才可以打开。代码有体现
			（然而现在我已经把他宕掉了）
具体的使用方法请访问我的博客：http://sumenpuyuan.com/2015/11/11/%E5%AE%9E%E9%AA%8C%E5%AE%A4%E7%89%A9%E8%81%94%E7%BD%91%E4%B8%8A%E5%B1%82%E5%BC%80%E5%8F%91%E6%97%A5%E5%BF%97/
<h1 style="border: 0px; font-family: &quot;Roboto Slab&quot;, Helvetica; font-size: 26px; margin: 0px 0px 0.6em; outline: 0px; padding: 0px; vertical-align: baseline; clear: both; line-height: 1.38462; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    实验室物联网上层开发日志
</h1>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    github地址：<a href="https://github.com/sumenpuyuan/lab" style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-decoration: none; transition: background 0.3s ease-in-out, color 0.2s ease-in-out; color: rgb(66, 139, 202);">https://github.com/sumenpuyuan/lab</a>
</p>
<h2 style="border-width: 0px 0px 0px 5px; border-top-style: initial; border-right-style: initial; border-bottom-style: initial; border-left-style: solid; border-top-color: initial; border-right-color: initial; border-bottom-color: initial; border-left-color: rgb(255, 97, 0); border-image: initial; font-family: Verdana, &quot;Microsoft YaHei&quot;; font-size: 20px; font-weight: normal; margin: 20px 0px; outline: 0px; padding: 5px 5px 5px 10px; vertical-align: baseline; clear: both; line-height: 30px; white-space: normal; background-color: rgb(238, 238, 238); color: rgb(69, 69, 69);">
    （1）首先要实现php调用shell脚本
</h2>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: inherit; font-size: large; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(255, 0, 0);"><span style="border: 0px; font-family: Arial; font-size: 18px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">一：配置</span></span>
</p>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    查看php.ini中配置是否打开安全模式，主要是以下三个地方safe_mode =&nbsp;&nbsp;(这个如果为off下面两个就不用管了)
</p>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    disable_functions =
</p>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    safe_mode_exec_dir=
</p>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(255, 0, 0);">ps1：博主按照上面的步骤配置，后来执行时还有问题。</span>
</p>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(255, 0, 0);">我们再次查看php.ini文件，到disable_functions = scandir,passthru,exec,system,chroot,chgrp,chown,shell_exec,proc_open,proc_get_status,ini_alter,ini_alter,ini_r</span>
</p>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(255, 0, 0);">estore,dl,pfsockopen,openlog,syslog,readlink,symlink,popepassthru,stream_socket_server,fsocket,fsockopen</span>
</p>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(255, 0, 0);">这些都是被禁用的函数，我们接下来会用到passthru函数，所以把passthru删掉，然后保存，重启服务</span>
</p>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(255, 0, 0);">ps2：后来又出问题了，因为一开始在centos上web端执行shell是没有问题的，可是到了ubuntu却执行不了，但是fswebcam软件在ubuntu上才有，于是最后通过一个灵活的途径执行了一条采集图像命令，而没有通过shell。</span>
</p>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: Arial; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;"><span style="border: 0px; font-family: inherit; font-size: large; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;"><span style="border: 0px; font-family: inherit; font-size: 18px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0);">&nbsp; &nbsp;</span><span style="border: 0px; font-family: inherit; font-size: 18px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(255, 0, 0);">二：代码</span></span></span>
</p>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0);"><span style="border: 0px; font-family: Arial; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;"><span style="border: 0px; font-family: inherit; font-size: large; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">&nbsp;到了愉快的代码环节，</span></span></span>
</p>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0);"><span style="border: 0px; font-family: Arial; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;"><span style="border: 0px; font-family: inherit; font-size: large; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">&nbsp;首先我们把shell脚本写了，我简单写了个脚本。各位自己随便写一个吧。</span></span></span>
</p>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0);"><span style="border: 0px; font-family: Arial; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;"><span style="border: 0px; font-family: inherit; font-size: large; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">&nbsp;然后及时php代码了。</span></span></span>
</p>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0);"><span style="border: 0px; font-family: Arial; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;"><span style="border: 0px; font-family: inherit; font-size: large; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">这是centos</span></span></span>
</p>
<p>
    <br/>
</p>
<table width="NaN">
    <tbody style="border: 0px !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px !important; vertical-align: baseline !important; background: none !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; height: auto !important; width: auto !important; line-height: 1.1em !important; direction: ltr !important;">
        <tr style="border: 0px !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px !important; vertical-align: baseline !important; background: none !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; height: auto !important; width: auto !important; line-height: 1.1em !important; direction: ltr !important;" class="firstRow">
            <td class="number" style="border-width: 0px !important; border-style: initial !important; border-color: initial !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px !important; vertical-align: top !important; line-height: 1.1em !important; background: none !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; direction: ltr !important; color: rgb(211, 211, 211) !important;" width="27">
                <code style="font-stretch: normal; border: 0px !important; font-family: Consolas, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, Courier, monospace !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px 0.3em 0px 0px !important; vertical-align: baseline !important; line-height: 1.1em !important; background: none !important; text-align: right !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; height: auto !important; width: 2.7em !important; direction: ltr !important; display: block !important;"><br/></code>
            </td>
            <td class="content" style="border-width: 0px 0px 0px 3px !important; border-top-style: initial !important; border-right-style: initial !important; border-bottom-style: initial !important; border-top-color: initial !important; border-right-color: initial !important; border-bottom-color: initial !important; border-left-color: rgb(153, 0, 0) !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px 0px 0px 0.5em !important; vertical-align: top !important; line-height: 1.1em !important; background: none !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; direction: ltr !important; color: rgb(185, 189, 182) !important;" width="-12"></td>
        </tr>
    </tbody>
</table>
<p>
    <br/>
</p>
<pre class="brush:php;toolbar:false">passthru(&#39;/usr/local/bin/ftp.sh&#39;,$returnvalue);
if ($returnvalue != 0){
//we have a problem!
echo &quot;wrong&quot;;
//add error code here
}else{
//we are okay
echo &quot;ok&quot;;
//redirect to some other page
}
?&amp;amp;amp;amp;amp;amp;gt;
&amp;amp;amp;amp;amp;amp;lt;/font&amp;amp;amp;amp;amp;amp;gt;</pre>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: inherit; font-size: large; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;"><br/>ubuntu上的<br/></span>
</p>
<table width="NaN">
    <tbody style="border: 0px !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px !important; vertical-align: baseline !important; background: none !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; height: auto !important; width: auto !important; line-height: 1.1em !important; direction: ltr !important;">
        <tr style="border: 0px !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px !important; vertical-align: baseline !important; background: none !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; height: auto !important; width: auto !important; line-height: 1.1em !important; direction: ltr !important;" class="firstRow">
            <td class="number" style="border-width: 0px !important; border-style: initial !important; border-color: initial !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px !important; vertical-align: top !important; line-height: 1.1em !important; background: none !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; direction: ltr !important; color: rgb(211, 211, 211) !important;" width="27">
                <code style="font-stretch: normal; border: 0px !important; font-family: Consolas, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, Courier, monospace !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px 0.3em 0px 0px !important; vertical-align: baseline !important; line-height: 1.1em !important; background: none !important; text-align: right !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; height: auto !important; width: 2.7em !important; direction: ltr !important; display: block !important;"><br/></code>
            </td>
            <td class="content" style="border-width: 0px 0px 0px 3px !important; border-top-style: initial !important; border-right-style: initial !important; border-bottom-style: initial !important; border-top-color: initial !important; border-right-color: initial !important; border-bottom-color: initial !important; border-left-color: rgb(153, 0, 0) !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px 0px 0px 0.5em !important; vertical-align: top !important; line-height: 1.1em !important; background: none !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; direction: ltr !important; color: rgb(185, 189, 182) !important;" width="NaN"></td>
        </tr>
    </tbody>
</table>
<table width="NaN">
    <tbody style="border: 0px !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px !important; vertical-align: baseline !important; background: none !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; height: auto !important; width: auto !important; line-height: 1.1em !important; direction: ltr !important;">
        <tr style="border: 0px !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px !important; vertical-align: baseline !important; background: none !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; height: auto !important; width: auto !important; line-height: 1.1em !important; direction: ltr !important;" class="firstRow">
            <td class="number" style="border-width: 0px !important; border-style: initial !important; border-color: initial !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px !important; vertical-align: top !important; line-height: 1.1em !important; background: none !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; direction: ltr !important; color: rgb(211, 211, 211) !important;" width="27">
                <code style="font-stretch: normal; border: 0px !important; font-family: Consolas, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, Courier, monospace !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px 0.3em 0px 0px !important; vertical-align: baseline !important; line-height: 1.1em !important; background: none !important; text-align: right !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; height: auto !important; width: 2.7em !important; direction: ltr !important; display: block !important;"><br/></code>
            </td>
            <td class="content" style="border-width: 0px 0px 0px 3px !important; border-top-style: initial !important; border-right-style: initial !important; border-bottom-style: initial !important; border-top-color: initial !important; border-right-color: initial !important; border-bottom-color: initial !important; border-left-color: rgb(153, 0, 0) !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px 0px 0px 0.5em !important; vertical-align: top !important; line-height: 1.1em !important; background: none !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; direction: ltr !important; color: rgb(185, 189, 182) !important;" width="NaN"></td>
        </tr>
    </tbody>
</table>
<pre class="brush:php;toolbar:false"> $a=&#39;sudo fswebcam -d/dev/video0 -r 320x240 /home/wwwroot/default/lot/1.jpg
&#39;;
system($a); //是这么执行的&amp;amp;amp;amp;amp;amp;lt;/font&amp;amp;amp;amp;amp;amp;gt;</pre>
<h2 style="border: 0px; font-family: &quot;Roboto Slab&quot;, Helvetica; font-size: 24px; margin: 0px 0px 0.6em; outline: 0px; padding: 0px; vertical-align: baseline; clear: both; line-height: 1; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: inherit; font-size: large; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;"><span style="border: 0px; font-family: inherit; font-size: 18px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(47, 79, 79);">&nbsp; 由于没有路由器，所以就用了花生壳，但是老是不稳定，所以又换了nat123，比花生壳稳定多了。<span style="font-family: inherit; font-size: large; font-style: inherit; font-weight: inherit; color: rgb(64, 64, 64);">&nbsp;</span><span style="font-family: inherit; font-style: inherit; font-weight: inherit; border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0);">视屏演示之后补上。</span>只看红色部分就好。</span>&nbsp;<span style="border: 0px; font-family: inherit; font-size: 18px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(47, 79, 79);">到现在，我们可以在本非访问了。<br/></span><span style="border: 0px; font-family: inherit; font-size: 18px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(255, 0, 0);">三：公网映射到内网ip</span>&nbsp;<span style="border: 0px; font-family: inherit; font-size: 18px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0);">&nbsp; &nbsp;</span></span><br/>
</h2>
<h2 style="border: 0px; font-family: &quot;Roboto Slab&quot;, Helvetica; font-size: 24px; margin: 0px 0px 0.6em; outline: 0px; padding: 0px; vertical-align: baseline; clear: both; line-height: 1; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;"></span>
</h2>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    &nbsp;<a href="http://v.youku.com/v_show/id_XMTM4MjQ0MzU2MA==.html" target="_self" title="http://v.youku.com/v_show/id_XMTM4MjQ0MzU2MA==.html">http://v.youku.com/v_show/id_XMTM4MjQ0MzU2MA==.html</a>
</p>
<h2 style="border-width: 0px 0px 0px 5px; border-top-style: initial; border-right-style: initial; border-bottom-style: initial; border-left-style: solid; border-top-color: initial; border-right-color: initial; border-bottom-color: initial; border-left-color: rgb(255, 97, 0); border-image: initial; font-family: Verdana, &quot;Microsoft YaHei&quot;; font-size: 20px; font-weight: normal; margin: 20px 0px; outline: 0px; padding: 5px 5px 5px 10px; vertical-align: baseline; clear: both; line-height: 30px; white-space: normal; background-color: rgb(238, 238, 238); color: rgb(69, 69, 69);">
    （2）用户权限访问问题
</h2>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0);"><span style="border: 0px; font-family: inherit; font-size: large; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">就是必须登录之后才能访问到<a href="http://labpuyuan.nat123.net/" style="border: 0px; font-family: inherit; font-size: 18px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-decoration: none; transition: background 0.3s ease-in-out, color 0.2s ease-in-out; color: rgb(66, 139, 202);">labpuyuan.nat123.net</a></span>这个</span><span style="border: 0px; font-family: inherit; font-size: large; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;"><span style="border: 0px; font-family: inherit; font-size: 18px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0);">页面，登录和nat123不在一个服务器上无法通过session来判断，所以使用了http报头$_SERVER[&#39;HTTP_REFERER&#39;])全局变量，通过判断是通过哪个页面跳到的nat123页面来进行限制。</span>&nbsp;<span style="border: 0px; font-family: inherit; font-size: 18px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0);">代码如下。</span></span>
</p>
<pre class="brush:php;toolbar:false">&lt;font size=&quot;4&quot;&gt;&lt;html&gt;
&lt;head&gt;
&lt;meta charset=&quot;utf-8&quot;&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;?php
        if(isset($_SERVER[&#39;HTTP_REFERER&#39;]))
{
        if(strpos($_SERVER[&#39;HTTP_REFERER&#39;],&quot;http://lab.52nongda.com/DynamicModules/RegisterAndLogin/&quot;)==0)
        {
                echo &quot;欢迎实验室同学访问&quot;;
        }
        else
        {
                header(&quot;location:error.html&quot;);
                exit();
        }
}
else
{
        header(&quot;location:error.html&quot;);
}
?&gt;
&lt;img src=&quot;lot/1.jpg&quot;&gt;
&lt;a href=&quot;screen.php&quot;&gt;refresh catch img&lt;/a&gt;
&lt;?php
session_start();
        if(isset($_SESSION[&#39;key&#39;]))

{
//      session_start();
        $key=$_SESSION[&#39;key&#39;];
        if($key==1)
{
        echo &quot;hhha&quot;;
        echo &quot;&lt;script language=javascript&gt;location.reload(true);&lt;/script&gt;&quot;;
        unset($_SESSION[&#39;key&#39;]);
}
}
?&gt;
&lt;/body&gt;
&lt;/htm</pre>
<p>
    <span style="font-family: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(255, 0, 0);">更新2015/11/12:</span><span style="font-family: inherit; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">出现重大失误，上面的权限问题有很大的漏洞，他只能限制refrerer不存在的时候，根本不能限制refrerer变量的内容，原因我们把限制语句拿出来</span><br/>
</p>
<pre style="border: 0px; font-family: &quot;Courier 10 Pitch&quot;, Courier, monospace; font-size: 1.5rem; margin-top: 0px; margin-bottom: 1.6em; outline: 0px; padding: 1em; vertical-align: baseline; background-color: rgb(238, 238, 238); line-height: 1.6; max-width: 100%; overflow: auto; color: rgb(64, 64, 64);">if(strpos($_SERVER[&#39;HTTP_REFERER&#39;],&quot;http://lab.52nongda.com/DynamicModules/RegisterAndLogin/&quot;)==0)</pre>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    我想实现的是必须从&quot;http://lab.52nongda.com/DynamicModules/RegisterAndLogin那里跳转才能打开，用的strops函数，那样结果为0，才能跳转，可是如果在referer变量里如果根本没有&quot;http://lab.52nongda.com/DynamicModules/RegisterAndLogin这个字符串，那么函数返回一个bool类型的false，<span style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(255, 0, 0);">在php中布尔值 FALSE 自身 与整型值 0 (零)是相等的，</span>&nbsp;<span style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0);">悲催了，所以稍微把限制语句改了一下。</span>
</p>
<table width="NaN" style="width: 828px;">
    <tbody style="border: 0px !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px !important; vertical-align: baseline !important; background: none !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; height: auto !important; width: auto !important; line-height: 1.1em !important; direction: ltr !important;">
        <tr style="border: 0px !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px !important; vertical-align: baseline !important; background: none !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; height: auto !important; width: auto !important; line-height: 1.1em !important; direction: ltr !important;" class="firstRow">
            <td class="number" style="border-width: 0px !important; border-style: initial !important; border-color: initial !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px !important; vertical-align: top !important; line-height: 1.1em !important; background: none !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; direction: ltr !important; color: rgb(211, 211, 211) !important;" width="27">
                <code style="font-stretch: normal; border: 0px !important; font-family: Consolas, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, Courier, monospace !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px 0.3em 0px 0px !important; vertical-align: baseline !important; line-height: 1.1em !important; background: none !important; text-align: right !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; height: auto !important; width: 2.7em !important; direction: ltr !important; display: block !important;"><br/></code>
            </td>
            <td class="content" style="border-width: 0px 0px 0px 3px !important; border-top-style: initial !important; border-right-style: initial !important; border-bottom-style: initial !important; border-top-color: initial !important; border-right-color: initial !important; border-bottom-color: initial !important; border-left-color: rgb(153, 0, 0) !important; font-size: 1em !important; margin: 0px !important; outline: 0px !important; padding: 0px 0px 0px 0.5em !important; vertical-align: top !important; line-height: 1.1em !important; background: none !important; float: none !important; position: static !important; left: auto !important; top: auto !important; right: auto !important; bottom: auto !important; direction: ltr !important; color: rgb(185, 189, 182) !important;" width="NaN">
                <p>
                    <br/>
                </p>
            </td>
        </tr>
    </tbody>
</table>
<pre class="brush:php;toolbar:false">if(strpos($_SERVER[&#39;HTTP_REFERER&#39;],&#39;lab.52nongda.com/DynamicModules/RegisterAndLogin&#39;)==7)</pre>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: inherit; font-size: large; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;"></span><br/>
</p>
<p style="border: 0px; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64); white-space: normal; background-color: rgb(255, 255, 255);">
    <span style="border: 0px; font-family: inherit; font-size: large; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">正好最近实现了</span><a href="http://lab.52nongda.com/" target="_blank" style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-decoration: none; transition: background 0.3s ease-in-out, color 0.2s ease-in-out; color: rgb(66, 139, 202);">lab.52nongda.com</a><span style="border: 0px; font-family: inherit; font-size: large; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">的普通用户登录功能，（昨天把所有用户都删了，恒创主机今天有点问题，所以等恒创好了再说）。</span>
</p>
<p>
    <br/>
</p>
