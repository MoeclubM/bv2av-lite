<html>
<head>
    <meta charset="utf-8" />
    <meta name="keywords" content="bv号,av号,哔哩哔哩">
    <meta name="description" content="一个可以将BV号转AV号的小工具">
    <meta itemprop="name" content="BV号转AV号工具">
    <meta itemprop="description" content="BV号转AV号工具">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="referrer" content="no-referrer">
    <title>BV号转AV号 - BV2AV</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/buttons.css" rel="stylesheet">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
			height: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }
        
        .container {
            text-align: center;
            display: block;
            position: relative;
            top: 150px;
            vertical-align: middle;
        }
        
        .content {
            text-align: center;
            display: inline-block;
        }
        
        .title {
            font-size: 66px;
        }
        
        .title small {
            font-size: 33px;
        }
        
        .title a {
            color: #000;
            text-decoration: none;
        }
        
        goo {
            display: block;
            position: fixed;
            top: 250px;
        }
        goog{
            display: block;
            position: fixed;
            bottom:0px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="title">BV号AV号转换</div>
			<br>
		<br>
        </div>
        <div class="row"></div>
            <div class="for-group">
                <div class="goo">
                    <form action="/index.php">
                    <input type="text" id="x" name="BV" placeholder="请输入视频AV/BV号(记得带上英文哦，BV自动转换成AV，AV自动转换成BV)" value="<?php echo $_GET['BV'] ?>" class="form-control" style="text-align:center"/>
                    <br>
					<br>
                    <button type="button" class = "button center button button-glow button-border button-rounded button-primary" onclick="return exchange() && false">转换</button>&nbsp;&nbsp;
                    </form>
                </div>
            </div>
		<p id="result">
        <?php
		if (isset($_GET['BV'])){  
			$str = trim($_GET['BV']);
			$str = strip_tags($str);
			$str = htmlspecialchars($str);
		}  
		if($str != ""){
			$bv = stristr($str,"BV1");
			$bv = substr($bv,0,12);
			if(strlen($str) != 12){
				if(strtolower(substr($str,0,2)) == 'av'){
					echo dec($str);
				}elseif(strlen($str) == 9){
					echo dec('BV1'.$str);
				}elseif(strlen($str) == 10){
					echo dec('BV'.$str);
				}else{
					echo "<font size='4' color='red'>".$str." 输入有误！</font>";
				}
			}else{
				echo dec($bv);
			}
		}
		?>
		</p>
	<script>
	'use strict';
	const table = [...'fZodR9XQDSUm21yCkr6zBqiveYah8bt4xsWpHnJE7jL5VG3guMTKNPAwcF'];
	const s = [11, 10, 3, 8, 4, 6];
	const xor = 177451812;
	const add = 8728348608;
	const av2bv = (av) => {
		let num = NaN;
		if (Object.prototype.toString.call(av) === '[object Number]') {
			num = av;
		} else if (Object.prototype.toString.call(av) === '[object String]') {
			num = parseInt(av.replace(/[^0-9]/gu, ''));
		};
		if (isNaN(num) || num <= 0) {
			return '输入有误！';
		};

		num = (num ^ xor) + add;
		let result = [...'bv1  4 1 7  '];
		let i = 0;
		while (i < 6) {
			result[s[i]] = table[Math.floor(num / 58 ** i) % 58];
			i += 1;
		};
		return result.join('');
	};

	const bv2av = (bv) => {
		let str = '';
		if (bv.length === 12) {
			str = bv;
		} else if (bv.length === 10) {
			str = `BV${bv}`;
		} else if (bv.length === 9) {
			str = `BV1${bv}`;
		} else {
			return '输入有误！';
		};
		if (!str.match(/[Bb][Vv][fZodR9XQDSUm21yCkr6zBqiveYah8bt4xsWpHnJE7jL5VG3guMTKNPAwcF]{10}/gu)) {
			return '输入有误！';
		};

		let result = 0;
		let i = 0;
		while (i < 6) {
			result += table.indexOf(str[s[i]]) * 58 ** i;
			i += 1;
		};
		return `av${result - add ^ xor}`;
	};


	const exchange = () => {
		var x = document.getElementById('x').value;
		if(x.substring(0,2).toLowerCase()=='bv'){
			document.getElementById('x').value = `${bv2av(x)}`;
		}else if(x.substring(0,2).toLowerCase()=='av'){
			document.getElementById('x').value = `${av2bv(x)}`;
		}
	};
	</script>

	<div class = "goog">
		<br>
		<br>
		<a href="https://github.com/2594418727/bv2av-lite" target="_blank">GitHub</a>
	</div>
</body>