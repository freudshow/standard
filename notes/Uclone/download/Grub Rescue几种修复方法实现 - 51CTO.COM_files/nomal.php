document.write('<form action="http://www.51cto.com/php/sendfeedback.php" target="_self" method="post" name="feedback" id="feedback" onsubmit="return commentSubmit(this)" style="padding: 0px; margin: 0px;">');
document.write('<div class="m_l_Comments2"><span class="m_l_Comments2_l">');
document.write('<input type="hidden" name="artID" value="205349" />');
document.write('<input type="hidden" name="quick" value="0" />');
document.write('<input type="hidden" name="author2" value="51CTO����" />');
document.write('<textarea name="msg" id="msg" class="test2"></textarea></span></div>');
document.write('<div>&nbsp;��֤�룺<input name="authnum" onClick="displaysecunum()" type="text" class="test3" />');
document.write('<img id="secunum" onClick="refimg()" style="display:none">');
document.write('<span style="display:none;" id="spanfont">���ͼƬ��ˢ����֤��</span>');
document.write('<span style="display:inline;" id="clickfont">������������֤��</span>');
document.write('&nbsp; <input name="nouser" type="checkbox" value="1">��������');
document.write('<input type="submit" name="Submit23" value="�ύ" />');
document.write('</form>');
function displaysecunum(){
				var displaystr = document.getElementById("secunum").style.display;
				if(displaystr == 'none')
				{
					refimg();
					document.getElementById("clickfont").style.display = 'none';
					document.getElementById("secunum").style.display = 'inline';
					document.getElementById("spanfont").style.display = 'inline';
				}
			}
