/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : syrator

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-01-13 17:42:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for syrator_app_guide
-- ----------------------------
DROP TABLE IF EXISTS `syrator_app_guide`;
CREATE TABLE `syrator_app_guide` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '配置选项名',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '配置选项值',
  `sort_num` tinyint(3) unsigned NOT NULL DEFAULT '50',
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `is_show` tinyint(3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`name`,`url`),
  UNIQUE KEY `system_option_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='系统模板表';

-- ----------------------------
-- Records of syrator_app_guide
-- ----------------------------
INSERT INTO `syrator_app_guide` VALUES ('2', '2', '/uploads/content/20170113/587883dddbc21_05o.jpg', '2', '2', '1', '2017-01-13 15:38:08', '2017-01-13 15:38:08');
INSERT INTO `syrator_app_guide` VALUES ('3', '3', '/uploads/content/20170113/58788db98038f_09o.jpg', '3', '3', '1', '2017-01-13 16:20:11', '2017-01-13 16:20:11');

-- ----------------------------
-- Table structure for syrator_article
-- ----------------------------
DROP TABLE IF EXISTS `syrator_article`;
CREATE TABLE `syrator_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` smallint(5) NOT NULL DEFAULT '0',
  `title` varchar(150) NOT NULL DEFAULT '',
  `content` longtext NOT NULL,
  `author` varchar(30) NOT NULL DEFAULT '',
  `author_email` varchar(60) NOT NULL DEFAULT '',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `article_type` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `is_open` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `file_url` varchar(255) NOT NULL DEFAULT '',
  `open_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `link` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of syrator_article
-- ----------------------------
INSERT INTO `syrator_article` VALUES ('1', '2', '免责条款', '&lt;p&gt;sdsdsds&lt;br/&gt;&lt;/p&gt;', '', '', '', '0', '1', '', '0', '', '', '2016-08-31 11:04:14', '2016-09-08 20:19:53');
INSERT INTO `syrator_article` VALUES ('2', '2', '隐私保护', '', '', '', '', '0', '1', '', '0', '', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('3', '2', '咨询热点', '', '', '', '', '0', '1', '', '0', '', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('4', '2', '联系我们', '', '', '', '', '0', '1', '', '0', '', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('5', '2', '公司简介', '', '', '', '', '0', '1', '', '0', '', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('6', '-1', '用户协议', '<h4 style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 14px; font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">一步之美用户注册协议</h4><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">本协议是您与一步之美网站（简称&quot;本站&quot;，网址：www.yibuzhimei.com）所有者（以下简称为&quot;一步之美&quot;）之间就一步之美网站服务等相关事宜所订立的契约，请您仔细阅读本注册协议，您点击&quot;同意并继续&quot;按钮后，本协议即构成对双方有约束力的法律文件。</p><h5 style=\"margin: 10px 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 14px; font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">第1条 本站服务条款的确认和接纳</h5><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">1.1</strong>本站的各项电子服务的所有权和运作权归一步之美所有。用户同意所有注册协议条款并完成注册程序，才能成为本站的正式用户。用户确认：本协议条款是处理双方权利义务的契约，始终有效，法律另有强制性规定或双方另有特别约定的，依其规定。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">1.2</strong>用户点击同意本协议的，即视为用户确认自己具有享受本站服务、下单购物等相应的权利能力和行为能力，能够独立承担法律责任。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">1.3</strong>如果您在18周岁以下，您只能在父母或监护人的监护参与下才能使用本站。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">1.4</strong>一步之美保留在中华人民共和国大陆地区法施行之法律允许的范围内独自决定拒绝服务、关闭用户账户、清除或编辑内容或取消订单的权利。</p><h5 style=\"margin: 10px 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 14px; font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">第2条 本站服务</h5><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">2.1</strong>一步之美通过互联网依法为用户提供互联网信息等服务，用户在完全同意本协议及本站规定的情况下，方有权使用本站的相关服务。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">2.2</strong>用户必须自行准备如下设备和承担如下开支：（1）上网设备，包括并不限于电脑或者其他上网终端、调制解调器及其他必备的上网装置；（2）上网开支，包括并不限于网络接入费、上网设备租用费、手机流量费等。</p><h5 style=\"margin: 10px 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 14px; font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">第3条 用户信息</h5><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">3.1</strong>用户应自行诚信向本站提供注册资料，用户同意其提供的注册资料真实、准确、完整、合法有效，用户注册资料如有变动的，应及时更新其注册资料。如果用户提供的注册资料不合法、不真实、不准确、不详尽的，用户需承担因此引起的相应责任及后果，并且一步之美保留终止用户使用一步之美各项服务的权利。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">3.2</strong>用户在本站进行浏览、下单购物等活动时，涉及用户真实姓名/名称、通信地址、联系电话、电子邮箱等隐私信息的，本站将予以严格保密，除非得到用户的授权或法律另有规定，本站不会向外界披露用户隐私信息。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">3.3</strong>用户注册成功后，将产生用户名和密码等账户信息，您可以根据本站规定改变您的密码。用户应谨慎合理的保存、使用其用户名和密码。用户若发现任何非法使用用户账号或存在安全漏洞的情况，请立即通知本站并向公安机关报案。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">3.4</strong><strong style=\"margin: 0px; padding: 0px;\">用户同意，一步之美拥有通过邮件、短信电话等形式，向在本站注册、购物用户、收货人发送订单信息、促销活动等告知信息的权利。</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">3.5</strong><strong style=\"margin: 0px; padding: 0px;\">用户不得将在本站注册获得的账户借给他人使用，否则用户应承担由此产生的全部责任，并与实际使用人承担连带责任。</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">3.6</strong><strong style=\"margin: 0px; padding: 0px;\">用户同意，一步之美有权使用用户的注册信息、用户名、密码等信息，登录进入用户的注册账户，进行证据保全，包括但不限于公证、见证等。</strong></p><h5 style=\"margin: 10px 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 14px; font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">第4条 用户依法言行义务</h5><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">本协议依据国家相关法律法规规章制定，用户同意严格遵守以下义务：</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">（1）</strong>不得传输或发表：煽动抗拒、破坏宪法和法律、行政法规实施的言论，煽动颠覆国家政权，推翻社会主义制度的言论，煽动分裂国家、破坏国家统一的的言论，煽动民族仇恨、民族歧视、破坏民族团结的言论；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">（2）</strong>从中国大陆向境外传输资料信息时必须符合中国有关法规；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">（3）</strong>不得利用本站从事洗钱、窃取商业秘密、窃取个人信息等违法犯罪活动；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">（4）</strong>不得干扰本站的正常运转，不得侵入本站及国家计算机信息系统；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">（5）</strong>不得传输或发表任何违法犯罪的、骚扰性的、中伤他人的、辱骂性的、恐吓性的、伤害性的、庸俗的，淫秽的、不文明的等信息资料；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">（6）</strong>不得传输或发表损害国家社会公共利益和涉及国家安全的信息资料或言论；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">（7）</strong>不得教唆他人从事本条所禁止的行为；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">（8）</strong>不得利用在本站注册的账户进行牟利性经营活动；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">（9）</strong>不得发布任何侵犯他人著作权、商标权等知识产权或合法权利的内容；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">用户应不时关注并遵守本站不时公布或修改的各类合法规则规定。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">本站保有删除站内各类不符合法律政策或不真实的信息内容而无须通知用户的权利。</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">若用户未遵守以上规定的，本站有权作出独立判断并采取暂停或关闭用户帐号等措施。</strong>用户须对自己在网上的言论和行为承担法律责任。</p><h5 style=\"margin: 10px 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 14px; font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">第5条 商品信息</h5><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">本站上的商品价格、数量、是否有货等商品信息随时都有可能发生变动，本站不作特别通知。由于网站上商品信息的数量极其庞大，虽然本站会尽最大努力保证您所浏览商品信息的准确性，但由于众所周知的互联网技术因素等客观原因存在，本站网页显示的信息可能会有一定的滞后性或差错，对此情形您知悉并理解；一步之美欢迎纠错，并会视情况给予纠错者一定的奖励。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">为表述便利，商品和服务简称为&quot;商品&quot;或&quot;货物&quot;。</p><h5 style=\"margin: 10px 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 14px; font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">第6条 订单</h5><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">6.1</strong>在您下订单时，请您仔细确认所购商品的名称、价格、数量、型号、规格、尺寸、联系地址、电话、收货人等信息。<span style=\"margin: 0px; padding: 0px;\">收货人与用户本人不一致的，收货人的行为和意思表示视为用户的行为和意思表示，用户应对收货人的行为及意思表示的法律后果承担连带责任。</span></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">6.2</strong><strong style=\"margin: 0px; padding: 0px;\">除法律另有强制性规定外，双方约定如下：本站上销售方展示的商品和价格等信息仅仅是交易信息的发布，您下单时须填写您希望购买的商品数量、价款及支付方式、收货人、联系方式、收货地址等内容；系统生成的订单信息是计算机信息系统根据您填写的内容自动生成的数据，仅是您向销售方发出的交易诉求；销售方收到您的订单信息后，只有在销售方将您在订单中订购的商品从仓库实际直接向您发出时（ 以商品出库为标志），方视为您与销售方之间就实际直接向您发出的商品建立了交易关系；如果您在一份订单里订购了多种商品并且销售方只给您发出了部分商品时，您与销售方之间仅就实际直接向您发出的商品建立了交易关系；只有在销售方实际直接向您发出了订单中订购的其他商品时，您和销售方之间就订单中该其他已实际直接向您发出的商品才成立交易关系。您可以随时登录您在本站注册的账户，查询您的订单状态。</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">6.3</strong><strong style=\"margin: 0px; padding: 0px;\">由于市场变化及各种以合理商业努力难以控制的因素的影响，本站无法保证您提交的订单信息中希望购买的商品都会有货；如您拟购买的商品，发生缺货，您有权取消订单。</strong></p><h5 style=\"margin: 10px 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 14px; font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">第7条 配送</h5><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">7.1</strong>销售方将会把商品（货物）送到您所指定的收货地址，所有在本站上列出的送货时间为参考时间，参考时间的计算是根据库存状况、正常的处理过程和送货时间、送货地点的基础上估计得出的。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">7.2</strong>因如下情况造成订单延迟或无法配送等，销售方不承担延迟配送的责任：</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">（1）</strong>用户提供的信息错误、地址不详细等原因导致的；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">（2）</strong>货物送达后无人签收，导致无法配送或延迟配送的；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">（3）</strong>情势变更因素导致的；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">（4）</strong>不可抗力因素导致的，例如：自然灾害、交通戒严、突发战争等。</p><h5 style=\"margin: 10px 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 14px; font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">第8条 所有权及知识产权条款</h5><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">8.1</strong><strong style=\"margin: 0px; padding: 0px;\">用户一旦接受本协议，即表明该用户主动将其在任何时间段在本站发表的任何形式的信息内容（包括但不限于客户评价、客户咨询、各类话题文章等信息内容）的财产性权利等任何可转让的权利，如著作权财产权（包括并不限于：复制权、发行权、出租权、展览权、表演权、放映权、广播权、信息网络传播权、摄制权、改编权、翻译权、汇编权以及应当由著作权人享有的其他可转让权利），全部独家且不可撤销地转让给一步之美所有，用户同意一步之美有权就任何主体侵权而单独提起诉讼。</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">8.2</strong><strong style=\"margin: 0px; padding: 0px;\">本协议已经构成《中华人民共和国著作权法》第二十五条（条文序号依照2011年版著作权法确定）及相关法律规定的著作财产权等权利转让书面协议，其效力及于用户在一步之美网站上发布的任何受著作权法保护的作品内容，无论该等内容形成于本协议订立前还是本协议订立后。</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">8.3</strong><strong style=\"margin: 0px; padding: 0px;\">用户同意并已充分了解本协议的条款，承诺不将已发表于本站的信息，以任何形式发布或授权其它主体以任何方式使用（包括但不限于在各类网站、媒体上使用）。</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">8.4</strong>一步之美<strong style=\"margin: 0px; padding: 0px;\">是本站的制作者,拥有此网站内容及资源的著作权等合法权利,受国家法律保护,有权不时地对本协议及本站的内容进行修改，并在本站张贴，无须另行通知用户。在法律允许的最大限度范围内，一步之美对本协议及本站内容拥有解释权。</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">8.5</strong><strong style=\"margin: 0px; padding: 0px;\">除法律另有强制性规定外，未经一步之美明确的特别书面许可,任何单位或个人不得以任何方式非法地全部或部分复制、转载、引用、链接、抓取或以其他方式使用本站的信息内容，否则，一步之美有权追究其法律责任。</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">8.6</strong>本站所刊登的资料信息（诸如文字、图表、标识、按钮图标、图像、声音文件片段、数字下载、数据编辑和软件），均是一步之美或其内容提供者的财产，受中国和国际版权法的保护。本站上所有内容的汇编是一步之美的排他财产，受中国和国际版权法的保护。本站上所有软件都是一步之美或其关联公司或其软件供应商的财产，受中国和国际版权法的保护。</p><h5 style=\"margin: 10px 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 14px; font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">第9条 责任限制及不承诺担保</h5><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">除非另有明确的书面说明,本站及其所包含的或以其它方式通过本站提供给您的全部信息、内容、材料、产品（包括软件）和服务，均是在&quot;按现状&quot;和&quot;按现有&quot;的基础上提供的。</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">除非另有明确的书面说明,一步之美不对本站的运营及其包含在本网站上的信息、内容、材料、产品（包括软件）或服务作任何形式的、明示或默示的声明或担保（根据中华人民共和国法律另有规定的以外）。</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">一步之美不担保本站所包含的或以其它方式通过本站提供给您的全部信息、内容、材料、产品（包括软件）和服务、其服务器或从本站发出的电子信件、信息没有病毒或其他有害成分。</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">如因不可抗力或其它本站无法控制的原因使本站销售系统崩溃或无法正常使用导致网上交易无法完成或丢失有关的信息、记录等，一步之美会合理地尽力协助处理善后事宜。</strong></p><h5 style=\"margin: 10px 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 14px; font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">第10条 协议更新及用户关注义务</h5><p><span style=\"color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">根据国家法律法规变化及网站运营需要，一步之美有权对本协议条款不时地进行修改，修改后的协议一旦被张贴在本站上即生效，并代替原来的协议。用户可随时登录查阅最新协议；&nbsp;</span><strong style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px;\">用户有义务不时关注并阅读最新版的协议及网站公告。如用户不同意更新后的协议，可以且应立即停止接受一步之美网站依据本协议提供的服务；如用户继续使用本网站提供的服务的，即视为同意更新后的协议。一步之美建议您在使用本站之前阅读本协议及本站的公告。</span></strong><span style=\"color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">&nbsp;如果本协议中任何一条被视为废止、无效或因任何理由不可执行，该条应视为可分的且并不影响任何其余条款的有效性和可执行性。</span></p><h5 style=\"margin: 10px 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 14px; font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">第11条 法律管辖和适用</h5><p><span style=\"color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; background-color: rgb(255, 255, 255);\">本协议的订立、执行和解释及争议的解决均应适用在中华人民共和国大陆地区适用之有效法律（但不包括其冲突法规则）。 如发生本协议与适用之法律相抵触时，则这些条款将完全按法律规定重新解释，而其它有效条款继续有效。 如缔约方就本协议内容或其执行发生任何争议，双方应尽力友好协商解决；协商不成时，任何一方均可向有管辖权的中华人民共和国大陆地区法院提起诉讼。</span></p><h5 style=\"margin: 10px 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 14px; font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\">第12条 其他</h5><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">12.1</strong>一步之美网站所有者是指在政府部门依法许可或备案的一步之美网站经营主体。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">12.2</strong>一步之美尊重用户和消费者的合法权利，本协议及本网站上发布的各类规则、声明等其他内容，均是为了更好的、更加便利的为用户和消费者提供服务。本站欢迎用户和社会各界提出意见和建议，一步之美将虚心接受并适时修改本协议及本站上的各类规则。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">12.3</strong><span style=\"margin: 0px; padding: 0px;\">本协议内容中以黑体、加粗、下划线、斜体等方式显著标识的条款，请用户着重阅读。</span></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, &#39;Hiragino Sans GB&#39;; font-size: 14px; line-height: 20px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">12.4</strong><span style=\"margin: 0px; padding: 0px;\">您点击本协议下方的&quot;同意并继续&quot;按钮即视为您完全接受本协议，在点击之前请您再次确认已知悉并完全理解本协议的全部内容。</span></p><p><br/></p>', '', '', '', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('9', '5', '售后流程', '<p>登陆会员中心，在个人中心找到订单信息</p><p>与客服人员进行沟通，并提供相应的证明，</p><p>经客服人员确认之后即可进入人工售后阶段。</p>', '', '', '', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('10', '5', '购物流程', '<p>选择或搜索您所需商品，加入购物车，结算并选择合适的支付方式，您就可以完成一次愉快的购物。</p>', '', '', '', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('11', '5', '订购方式', '<p>目前一步之美已经开通有PC站以及手机站，均支持网络购物。</p><p>在搜索栏中输入自己想要的产品即可。</p><p><br/>&nbsp;</p>', '', '', '', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('15', '7', '货到付款区域', '<p>武汉市区我们均支持货到付款。其他地区尚未开通。</p>', '', '', '', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('16', '7', '配送支付查询 ', '', '', '', '', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('17', '7', '支付方式说明', '<p>目前我们仅支持支付宝网络支付。</p><p>其他的支付通道会陆陆续续打通，敬请期待。</p>', '', '', '', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('19', '10', '交易条款', '', '', '', '', '0', '0', '', '0', 'user.php?act=collection_list', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('20', '10', '订购流程', '<p style=\"margin-top: 0px; margin-bottom: 20px; margin-left: 28px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\">下单操作步骤：</span></p><p style=\"margin-top: 0px; margin-bottom: 20px; margin-left: 28px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\">1.<span style=\"margin: 0px; padding: 0px; font-family: &#39;Times New Roman&#39;; font-size: 9px;\">&nbsp;</span>浏览您要购买的商品，点击“加入购物车”，商品会自动添加到购物车里；</span></p><p style=\"margin-top: 0px; margin-bottom: 20px; margin-left: 28px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\">2.<span style=\"margin: 0px; padding: 0px; font-family: &#39;Times New Roman&#39;; font-size: 9px;\">&nbsp;</span>如果您需要更改商品数量，需在商品数量框中输入购买数量；（如下图）</span></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"http://img30.360buyimg.com/pophelp/jfs/t1600/22/79126860/210347/86ef9fc6/55559e93Neeb7d93a.png\" width=\"670\" title=\"\" alt=\"\" style=\"margin: 10px 0px 10px -2em; padding: 0px; border: 0px; vertical-align: middle; text-align: center; max-width: 650px;\"/></p><p style=\"margin-top: 0px; margin-bottom: 20px; margin-left: 28px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\">3.选好商品后点击“去结算”；（如下图）</span></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"http://img30.360buyimg.com/pophelp/jfs/t499/111/1373199640/48946/d4550d3f/55559ef5N96f685d7.png\" width=\"670\" title=\"\" alt=\"\" style=\"margin: 10px 0px 10px -2em; padding: 0px; border: 0px; vertical-align: middle; text-align: center; max-width: 650px;\"/></p><p><span style=\"font-family: 宋体, SimSun; font-size: 12px; line-height: 21px; text-indent: 24px; background-color: rgb(255, 255, 255);\">4.详细填写收货人信息、支付方式、发票信息，核对送货清单等信息；</span></p><p style=\"text-align: left;\"><span style=\"font-family: 宋体, SimSun; font-size: 12px; line-height: 21px; text-indent: 24px; background-color: rgb(255, 255, 255);\"></span><span style=\"font-family: 宋体, SimSun; text-indent: 2em; font-size: 12px; line-height: 21px; background-color: rgb(255, 255, 255);\">5.确认无误后点击“提交订单”，生成新订单并显示订单编号；</span></p><p style=\"text-align: left;\"><span style=\"font-family: 宋体, SimSun; font-size: 12px; line-height: 21px; text-indent: 2em; background-color: rgb(255, 255, 255);\">6.查看订单详细信息：可进入“我的京东”→“</span><a href=\"http://order.jd.com/center/list.action\" target=\"_blank\" style=\"font-family: 宋体, SimSun; font-size: 12px; line-height: 21px; text-indent: 2em; padding: 0px; color: rgb(77, 183, 235); background-color: rgb(255, 255, 255);\">订单中心</a><span style=\"font-family: 宋体, SimSun; font-size: 12px; line-height: 21px; text-indent: 2em; background-color: rgb(255, 255, 255);\">”查看。</span></p><p style=\"text-align: left;\"><span style=\"font-family: 宋体, SimSun; font-size: 12px; line-height: 21px; text-indent: 24px; background-color: rgb(255, 255, 255);\"><br/></span><br/></p>', '', '', '', '0', '1', '', '0', 'user.php?act=order_list', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('21', '8', '退换货原则', '<p style=\"margin-top: 0px; margin-bottom: 20px; white-space: normal; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: rgb(204, 0, 0);\">在商品无任何问题情况下，一步之美承诺：自您实际收到商品之日起7日内，在商品返回运费由您承担的情况下,可享受无理由退货。一步之美所售均为全新品，为保护消费者利益，以下商品不适用于7天无理由退货：</span></strong></span></p><p dir=\"ltr\" style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 28px; white-space: normal; padding: 0px; text-indent: 2em; line-height: 1.5em; font-family: Arial, Verdana, 宋体; font-size: 12px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">1) 个人定作类商品；</span></p><p dir=\"ltr\" style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 28px; white-space: normal; padding: 0px; text-indent: 2em; line-height: 1.5em; font-family: Arial, Verdana, 宋体; font-size: 12px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">2) 鲜活易腐类商品；</span></p><p dir=\"ltr\" style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 28px; white-space: normal; padding: 0px; text-indent: 2em; line-height: 1.5em; font-family: Arial, Verdana, 宋体; font-size: 12px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">3) 在线下载或者您拆封的音像制品，计算机软件等数字化商品；&nbsp;</span></p><p dir=\"ltr\" style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 28px; white-space: normal; padding: 0px; text-indent: 2em; line-height: 1.5em; font-family: Arial, Verdana, 宋体; font-size: 12px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">4) 交付的报纸期刊类商品；</span></p><p dir=\"ltr\" style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 28px; white-space: normal; padding: 0px; text-indent: 2em; line-height: 1.5em; font-family: Arial, Verdana, 宋体; font-size: 12px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">5) 其他根据商品性质不适宜退货，经您在购买时确认不宜退货的商品。</span></p><p style=\"margin-top: 0px; margin-bottom: 20px; white-space: normal; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; list-style-type: none; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px;\"><br/></span></p><p style=\"white-space: normal;\"><strong><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px; color: rgb(192, 0, 0);\">特别说明，以下情况不予办理退换货：</span></strong></p><ul class=\" list-paddingleft-2\" style=\"list-style-type: none;\"><li><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px;\"><span style=\"margin: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: Arial, sans-serif;\">1.<span style=\"margin: 0px; padding: 0px; font-family: &#39;Times New Roman&#39;; font-size: 9px; font-weight: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></strong><span style=\"margin: 0px; padding: 0px;\">任何非一步之美出售的商品（序列号不符）；</span></span></p></li><li><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px;\"><span style=\"margin: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: Arial, sans-serif;\">2.<span style=\"margin: 0px; padding: 0px; font-family: &#39;Times New Roman&#39;; font-size: 9px; font-weight: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></strong><span style=\"margin: 0px; padding: 0px;\">过保商品（超过三包保修期的商品）；</span></span></p></li><li><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px;\"><span style=\"margin: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: Arial, sans-serif;\">3.<span style=\"margin: 0px; padding: 0px; font-family: &#39;Times New Roman&#39;; font-size: 9px; font-weight: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></strong><span style=\"margin: 0px; padding: 0px;\">未经授权的维修、误用、碰撞、疏忽、滥用、进液、事故、改动、不正确的安装所造成的商品质量问题，或撕毁、涂改标贴、机器序号、防伪标记；</span></span></p></li><li><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px;\"><span style=\"margin: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: Arial, sans-serif;\">4.<span style=\"margin: 0px; padding: 0px; font-family: &#39;Times New Roman&#39;; font-size: 9px; font-weight: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></strong><span style=\"margin: 0px; padding: 0px;\">无法提供商品的发票、保修卡等三包凭证或者三包凭证信息与商品不符及被涂改的；</span></span></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px;\"><span style=\"margin: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: Arial, sans-serif;\">5.<span style=\"margin: 0px; padding: 0px; font-family: &#39;Times New Roman&#39;; font-size: 9px; font-weight: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></strong><span style=\"margin: 0px; padding: 0px;\">其他依法不应办理退换货的。</span></span></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px;\"><span style=\"margin: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-weight: normal;\">温馨提示：</span></strong><strong style=\"margin: 0px; padding: 0px;\">&nbsp;</strong><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-weight: normal;\">在商品退货时，需扣除购买该商品时通过评价或晒单所获得的积分及相应优惠，如账户积分已使用，则从</span></strong><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-weight: normal;\">商</span></strong><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-weight: normal;\">品退款金额中</span></strong><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-weight: normal;\">相应扣除；有赠品的主商品发生退货时，需将赠品一并提交退货返回，如赠品未退回，则主商品无法全额退款。</span></strong></span></p></li></ul><p><br/></p>', '', '', '服务', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('22', '8', '售后服务保证 ', '<p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: rgb(204, 0, 0);\">在商品无任何问题情况下，一步之美承诺：自您实际收到商品之日起7日内，在商品返回运费由您承担的情况下,可享受无理由退货。一步之美所售均为全新品，为保护消费者利益，以下商品不适用于7天无理由退货：</span></strong></span></p><p dir=\"ltr\" style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 28px; padding: 0px; text-indent: 2em; line-height: 1.5em; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">1) 个人定作类商品；</span></p><p dir=\"ltr\" style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 28px; padding: 0px; text-indent: 2em; line-height: 1.5em; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">2) 鲜活易腐类商品；</span></p><p dir=\"ltr\" style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 28px; padding: 0px; text-indent: 2em; line-height: 1.5em; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">3) 在线下载或者您拆封的音像制品，计算机软件等数字化商品；&nbsp;</span></p><p dir=\"ltr\" style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 28px; padding: 0px; text-indent: 2em; line-height: 1.5em; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">4) 交付的报纸期刊类商品；</span></p><p dir=\"ltr\" style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 28px; padding: 0px; text-indent: 2em; line-height: 1.5em; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">5) 其他根据商品性质不适宜退货，经您在购买时确认不宜退货的商品。</span></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; list-style-type: none; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px;\"><br/></span></p><p><strong><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px; color: rgb(192, 0, 0);\">特别说明，以下情况不予办理退换货：</span></strong></p><ul class=\" list-paddingleft-2\" style=\"list-style-type: none;\"><li><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px;\"><span style=\"margin: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: Arial, sans-serif;\">1.<span style=\"margin: 0px; padding: 0px; font-family: &#39;Times New Roman&#39;; font-size: 9px; font-weight: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></strong><span style=\"margin: 0px; padding: 0px;\">任何非一步之美出售的商品（序列号不符）；</span></span></p></li><li><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px;\"><span style=\"margin: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: Arial, sans-serif;\">2.<span style=\"margin: 0px; padding: 0px; font-family: &#39;Times New Roman&#39;; font-size: 9px; font-weight: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></strong><span style=\"margin: 0px; padding: 0px;\">过保商品（超过三包保修期的商品）；</span></span></p></li><li><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px;\"><span style=\"margin: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: Arial, sans-serif;\">3.<span style=\"margin: 0px; padding: 0px; font-family: &#39;Times New Roman&#39;; font-size: 9px; font-weight: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></strong><span style=\"margin: 0px; padding: 0px;\">未经授权的维修、误用、碰撞、疏忽、滥用、进液、事故、改动、不正确的安装所造成的商品质量问题，或撕毁、涂改标贴、机器序号、防伪标记；</span></span></p></li><li><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px;\"><span style=\"margin: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: Arial, sans-serif;\">4.<span style=\"margin: 0px; padding: 0px; font-family: &#39;Times New Roman&#39;; font-size: 9px; font-weight: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></strong><span style=\"margin: 0px; padding: 0px;\">无法提供商品的发票、保修卡等三包凭证或者三包凭证信息与商品不符及被涂改的；</span></span></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px;\"><span style=\"margin: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: Arial, sans-serif;\">5.<span style=\"margin: 0px; padding: 0px; font-family: &#39;Times New Roman&#39;; font-size: 9px; font-weight: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></strong><span style=\"margin: 0px; padding: 0px;\">其他依法不应办理退换货的。</span></span></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px;\"><span style=\"margin: 0px; padding: 0px;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-weight: normal;\">温馨提示：</span></strong><strong style=\"margin: 0px; padding: 0px;\">&nbsp;</strong><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-weight: normal;\">在商品退货时，需扣除购买该商品时通过评价或晒单所获得的积分及相应优惠，如账户积分已使用，则从</span></strong><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-weight: normal;\">商</span></strong><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-weight: normal;\">品退款金额中</span></strong><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-weight: normal;\">相应扣除；有赠品的主商品发生退货时，需将赠品一并提交退货返回，如赠品未退回，则主商品无法全额退款。</span></strong></span></p></li></ul><p><br/></p>', '', '', '售后', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('23', '8', '产品质量保证 ', '', '', '', '质量', '1', '0', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('24', '9', '网站故障报告', '<p>一般而言在您打不开网站的时候可以尝试多次刷新，</p><p>并同时开启多个窗口看是否其他网站同样也打不开。</p><p>如以上情况都未出现，则有可能是我们网站正在维护当中，您可以</p><p>适当留意我们网站上的信息。</p>', '', '', '', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('26', '9', '投诉与建议 ', '<p>请在购物之后对相关卖家进行评价</p><p>如发现不良或不法行为与我们的客服人员联系</p><p>经我们客服人员查证属实之后</p><p>我们会给予相关卖家处罚，并对顾客所遭受的损失进行定赔。</p>', '', '', '', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('42', '8', '换货流程', '<p>1、与客服人员沟通换货产品货号及型号</p><p>2、在我的订单处，修改退货信息</p><p>3、待卖家确认之后，发布退换货信息</p>', '', '', '', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('45', '7', '订单状态 ', '', '', '', '', '0', '0', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('68', '10', '联系客服', '<p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\"><strong style=\"margin: 0px; padding: 0px;\">1. PC电脑端：</strong>在商品页面右则，您可以看到卖家信息，点击“联系卖家”按钮，咨询卖家的在线客服人员，已开通400电话的卖家，您可直接致电卖家。（如下图）</span></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\"><img title=\"\" alt=\"\" src=\"http://img30.360buyimg.com/pophelp/jfs/t2122/65/1260962714/9284/c7b03400/5649743cN89ba0350.png\" style=\"margin: 10px 0px 10px -2em; padding: 0px; border: 0px; vertical-align: middle; text-align: center; max-width: 650px;\"/></span></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\"><strong style=\"margin: 0px; padding: 0px;\">2. APP移动客户端：</strong>在手机端商品页面中，在商品晒单的下方，点击“客服”按钮，即可与卖家客服在线沟通。</span></p><p><br/></p>', '', '', '', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('72', '5', '公司转账', '<p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\">支持工行、建行、招行、农行、浦发、中国、交通、兴业、光大银行九个银行网银转账；</span></span></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\">实时到款，一步之美</span><span style=\"font-family: 宋体, SimSun; text-indent: 2em;\">实时确认订单；</span></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\">同个人网银汇款，没有汇款识别码产生，且无需顾客填写付款确认。</span></p><p><br/></p>', '', '', '', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('73', '8', '退款说明', '<p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\"><strong style=\"margin: 0px; padding: 0px;\">取消订单后如何退款：</strong></span></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\">在线支付的订单（包含使用优惠劵、账户余额、积分等货到付款的订单）取消成功后，我们会为您提供“订单快速退款”服务，一步之美</span><span style=\"font-family: 宋体, SimSun; text-indent: 2em;\">退款处理时效如下：</span></p><p style=\"margin-top: 10px; margin-bottom: 10px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\"><strong style=\"margin: 0px; padding: 0px;\">一步之美自营商品订单：</strong></span></p><ol class=\" list-paddingleft-2\" style=\"padding: 0px; font-family: Arial, Verdana, 宋体; font-size: 12px; line-height: 18px; white-space: normal; background-color: rgb(255, 255, 255);\"><li><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px;\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\">商品出库前：若您在商品未出库前提交取消申请，会在30分钟后完成退款审核。</span></p></li><li><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px;\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\">商品送往配送站前：若您在商品已经出库，等待装车送往配送站前提交取消申请，会在24小时内完成退款审核。</span></p></li><li><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px;\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\">商品送往配送站的途中：若您在订单商品已经装车送往配送站的途中提交取消申请，会在商品到达配送站的当天24小时内完成退款审核。</span></p></li><li><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px;\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\">拒收订单：订单拒收后，系统会自动帮您提交取消申请，在当天24小时内完成退款审核。</span></p></li><li><p style=\"margin-top: 10px; margin-bottom: 10px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\"><strong style=\"margin: 0px; padding: 0px;\">第三方卖家商品订单：</strong></span></p></li><li><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; text-indent: 2em; line-height: 21px; font-family: Arial, Verdana, 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; font-family: 宋体, SimSun;\">第三方卖家订单根据卖家自身情况进行取消申请和退款受理。</span></p></li></ol><p><br/></p>', '', '', '', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('74', '8', '返修/退换货', '', '', '', '', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('75', '8', '取消订单', '<p class=\"MsoListParagraph\" style=\"margin-top: 0px;margin-bottom: 0px;margin-left: 28px;padding: 0px;line-height: 32px;font-family: Arial, Verdana, 宋体;font-size: 12px;white-space: normal;background: white\"><span style=\";padding: 0px;color: rgb(51, 51, 51);font-family: 宋体\">（</span><span style=\";padding: 0px;color: rgb(51, 51, 51);font-family: Arial, sans-serif\">1</span><span style=\";padding: 0px;color: rgb(51, 51, 51);font-family: 宋体\">）货到付款订单，订单处于暂停状态，您可以直接点击订单查看详情进去，右上角会有取消订单按钮，直接点击取消订单即可；如货物已经打包好等待发货，订单已经无法取消，建议您直接拒收商品；</span></p><p class=\"MsoListParagraph\" style=\"margin-top: 0px;margin-bottom: 0px;margin-left: 28px;padding: 0px;line-height: 32px;font-family: Arial, Verdana, 宋体;font-size: 12px;white-space: normal;background: white\"><span style=\";padding: 0px;color: rgb(51, 51, 51);font-family: 宋体\">（</span><span style=\";padding: 0px;color: rgb(51, 51, 51);font-family: Arial, sans-serif\">2</span><span style=\";padding: 0px;color: rgb(51, 51, 51);font-family: 宋体\">）在线支付订单，您可以直接点击订单后面取消按钮，然后申请退款即可，如后期货物送去，建议您直接拒收。</span></p><p class=\"MsoListParagraph\" style=\"margin-top: 0px;margin-bottom: 0px;margin-left: 28px;padding: 0px;line-height: 32px;font-family: Arial, Verdana, 宋体;font-size: 12px;white-space: normal;background: white\"><span style=\";padding: 0px;color: rgb(51, 51, 51);font-family: 宋体\">注意：</span></p><p class=\"MsoListParagraph\" style=\"margin-top: 0px;margin-bottom: 0px;margin-left: 28px;padding: 0px;line-height: 32px;font-family: Arial, Verdana, 宋体;font-size: 12px;white-space: normal;background: white\"><span style=\";padding: 0px;color: rgb(51, 51, 51);font-family: 宋体\">货到付款的订单，如果一个ID帐号在一个月内有过1次以上或一年内有过3次以上，无理由不接收我司配送的商品，我司将在相应的ID帐户里按每单扣除500个积分做为运费；时间计算方法为：成功提交订单后向前推算30天为一个月，成功提交订单后向前推算365天为一年，不以自然月和自然年计算。</span></p><p><br/></p>', '', '', '', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('78', '19', '供货商(入驻商文章标题)', '', 'yaso', 'yaso@yaso.com', '供货商,入驻商', '0', '1', '', '0', 'http://www.baidu.com', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('79', '19', '商家帮助指南', '<p><span style=\"font-size: 12px;\">1、登陆商家管理中心</span></p><p><span style=\"font-size: 12px;\">点击首页的“登陆商家管理中心”链接，进入登陆页面，商家输入自己的用户名密码（此用户名密码与商家在网站注册的用户名密码相同）即可登陆</span></p><p><span style=\"font-size: 12px;\">2、</span><span style=\"font-size: 12px;\">店铺基本设置</span></p><p><span style=\"font-size: 12px;\">点击店铺系统设置》店铺基本设置：网店信息</span></p><p style=\"text-align: left;\"><span style=\"font-size: 12px;\">2.1、填写商店名称、商店标题等基本信息，</span></p><p style=\"text-align: left;\"><span style=\"font-size: 12px;\">2.2、选择商店所在地址（必填项，否则前台店铺模板会报错），</span></p><p style=\"text-align: left;\"><span style=\"font-size: 12px;\">2.3、按要求上传店铺logo，大小要求：90 X 54像素</span></p><p style=\"text-align: left;\"><span style=\"font-size: 12px;\">2.4、设置商店首页商品数量，该数量控制店铺首页精品、新品、热卖的显示数量</span><br/></p><p style=\"text-align: left;\"><span style=\"font-size: 12px;\">注意：该处不能为空，也不能删除，你可以按照要求修改其显示数量</span></p><p style=\"text-align: left;\"><span style=\"font-size: 12px;\">2.5、设置全店搜索价格区间</span></p><p><span style=\"font-size: 12px;\">2.6、设置短信发送</span></p><p><span style=\"font-size: 12px;\">填写接收短信的手机号码，选择是否发送短信</span></p><p><span style=\"font-size: 12px;\">3、选择模板</span><br/></p><p><span style=\"font-size: 12px;\"><span style=\"font-size: 12px;\">点击店铺系统设置》店铺模板选择</span></span></p><p><span style=\"font-size: 12px;\"><span style=\"font-size: 12px;\">可以选择不同风格的模板</span></span></p><p><span style=\"font-size: 12px;\"><span style=\"font-size: 12px;\">4、申请店铺街</span></span></p><p><span style=\"font-size: 12px;\"><span style=\"font-size: 12px;\">选择店铺的经营类型，填写店铺名称、标题、描述、标签，上传店铺海报，提交即可。网站方管理员审核通过后就可以在店铺街看到你的店铺展示啦</span></span></p><p><span style=\"font-size: 12px;\"><span style=\"font-size: 12px;\">店铺是否出现在店铺街底部的推荐展示以及店铺的排列顺序请联系网站方协商修改。<br/></span></span></p><p><span style=\"font-size: 12px;\">5、</span><span style=\"font-size: 12px;\">权限管理</span><br/></p><p><span style=\"font-size: 12px;\">点击权限管理》管理员列表：增加新的管理员，并为其设置权限，选中哪个就拥有哪个权限</span></p><p><span style=\"font-size: 12px;\">6、添加商品分类：该商品分类是本店铺的分类</span></p><p><span style=\"font-size: 12px;\">7、添加商品，提交后等待网站方审核，审核通过后即可上架销售了</span></p><p><span style=\"font-size: 12px;\">8、管理自己的用户评论和用户晒单</span></p><p><span style=\"font-size: 12px;\">9、促销管理：增加自己店铺的促销活动以及店铺红包</span></p><p><span style=\"font-size: 12px;\">9.1、促销活动：该促销活动有三种“满X元减Y元”、“满X元打Y折”、“满X元赠送YY、ZZ商品”</span></p><p><span style=\"font-size: 12px; color: rgb(0, 0, 0);\">9.2、</span><span style=\"font-size: 12px; color: rgb(0, 0, 0);\">红包类型：该红包类型有四种：“按用户发放”、“按商品发放”、“按订单金额发放”、“线下发放的红包”</span></p><p><span style=\"font-size: 12px; color: rgb(0, 0, 0);\">9.2.1、按用户发放：可以控制该红包发送给哪些会员</span></p><p><span style=\"font-size: 12px; color: rgb(0, 0, 0);\"></span><span style=\"font-size: 12px; color: rgb(127, 127, 127);\"><span style=\"font-size: 12px; color: rgb(0, 0, 0);\">9.2.2、按商品方法：可以控制用户购买哪些商品时可以获得该红包</span></span></p><p><span style=\"font-size: 12px; color: rgb(127, 127, 127);\"><span style=\"font-size: 12px; color: rgb(0, 0, 0);\"><span style=\"font-size: 12px; color: rgb(0, 0, 0);\">9.2.3、按订单金额方法：可以控制用户购买商品满多少元时可以获得该红包</span></span></span></p><p><span style=\"font-size: 12px; color: rgb(127, 127, 127);\"><span style=\"font-size: 12px; color: rgb(0, 0, 0);\"><span style=\"font-size: 12px; color: rgb(0, 0, 0);\"><span style=\"font-size: 12px; color: rgb(0, 0, 0);\">9.2.4、线下发放：属于线下发放的红包，直接将该红包序列号发送给用户，用户凭借该序列号即可使用该红包了</span></span></span></span></p>', '', '', '', '0', '1', '', '0', 'http://', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article` VALUES ('80', '0', '', '&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;1、登陆商家管理中心&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;点击首页的&ldquo;登陆商家管理中心&rdquo;链接，进入登陆页面，商家输入自己的用户名密码（此用户名密码与商家在网站注册的用户名密码相同）即可登陆&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;2、&lt;/span&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;店铺基本设置&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;点击店铺系统设置》店铺基本设置：网店信息&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;2.1、填写商店名称、商店标题等基本信息，&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;2.2、选择商店所在地址（必填项，否则前台店铺模板会报错），&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;2.3、按要求上传店铺logo，大小要求：90 X 54像素&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;2.4、设置商店首页商品数量，该数量控制店铺首页精品、新品、热卖的显示数量&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;注意：该处不能为空，也不能删除，你可以按照要求修改其显示数量&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;2.5、设置全店搜索价格区间&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;2.6、设置短信发送&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;填写接收短信的手机号码，选择是否发送短信&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;3、选择模板&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;点击店铺系统设置》店铺模板选择&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;可以选择不同风格的模板&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;4、申请店铺街&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;选择店铺的经营类型，填写店铺名称、标题、描述、标签，上传店铺海报，提交即可。网站方管理员审核通过后就可以在店铺街看到你的店铺展示啦&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;店铺是否出现在店铺街底部的推荐展示以及店铺的排列顺序请联系网站方协商修改。&lt;br/&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;5、&lt;/span&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;权限管理&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;点击权限管理》管理员列表：增加新的管理员，并为其设置权限，选中哪个就拥有哪个权限&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;6、添加商品分类：该商品分类是本店铺的分类&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;7、添加商品，提交后等待网站方审核，审核通过后即可上架销售了&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;8、管理自己的用户评论和用户晒单&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;9、促销管理：增加自己店铺的促销活动以及店铺红包&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;9.1、促销活动：该促销活动有三种&ldquo;满X元减Y元&rdquo;、&ldquo;满X元打Y折&rdquo;、&ldquo;满X元赠送YY、ZZ商品&rdquo;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;9.2、&lt;/span&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;红包类型：该红包类型有四种：&ldquo;按用户发放&rdquo;、&ldquo;按商品发放&rdquo;、&ldquo;按订单金额发放&rdquo;、&ldquo;线下发放的红包&rdquo;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;9.2.1、按用户发放：可以控制该红包发送给哪些会员&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 12px; color: rgb(127, 127, 127);&quot;&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;9.2.2、按商品方法：可以控制用户购买哪些商品时可以获得该红包&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px; color: rgb(127, 127, 127);&quot;&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;9.2.3、按订单金额方法：可以控制用户购买商品满多少元时可以获得该红包&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px; color: rgb(127, 127, 127);&quot;&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;9.2.4、线下发放：属于线下发放的红包，直接将该红包序列号发送给用户，用户凭借该序列号即可使用该红包了&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', '', '', '', '2', '1', '', '0', '', null, '2016-09-07 23:30:42', '2016-09-07 23:30:42');
INSERT INTO `syrator_article` VALUES ('81', '0', '', '&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;1、登陆商家管理中心&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;点击首页的&ldquo;登陆商家管理中心&rdquo;链接，进入登陆页面，商家输入自己的用户名密码（此用户名密码与商家在网站注册的用户名密码相同）即可登陆&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;2、&lt;/span&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;店铺基本设置&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;点击店铺系统设置》店铺基本设置：网店信息&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;2.1、填写商店名称、商店标题等基本信息，&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;2.2、选择商店所在地址（必填项，否则前台店铺模板会报错），&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;2.3、按要求上传店铺logo，大小要求：90 X 54像素&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;2.4、设置商店首页商品数量，该数量控制店铺首页精品、新品、热卖的显示数量&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;注意：该处不能为空，也不能删除，你可以按照要求修改其显示数量&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;2.5、设置全店搜索价格区间&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;2.6、设置短信发送&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;填写接收短信的手机号码，选择是否发送短信&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;3、选择模板&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;点击店铺系统设置》店铺模板选择&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;可以选择不同风格的模板&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;4、申请店铺街&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;选择店铺的经营类型，填写店铺名称、标题、描述、标签，上传店铺海报，提交即可。网站方管理员审核通过后就可以在店铺街看到你的店铺展示啦&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;店铺是否出现在店铺街底部的推荐展示以及店铺的排列顺序请联系网站方协商修改。&lt;br/&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;5、&lt;/span&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;权限管理&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;点击权限管理》管理员列表：增加新的管理员，并为其设置权限，选中哪个就拥有哪个权限&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;6、添加商品分类：该商品分类是本店铺的分类&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;7、添加商品，提交后等待网站方审核，审核通过后即可上架销售了&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;8、管理自己的用户评论和用户晒单&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;9、促销管理：增加自己店铺的促销活动以及店铺红包&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px;&quot;&gt;9.1、促销活动：该促销活动有三种&ldquo;满X元减Y元&rdquo;、&ldquo;满X元打Y折&rdquo;、&ldquo;满X元赠送YY、ZZ商品&rdquo;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;9.2、&lt;/span&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;红包类型：该红包类型有四种：&ldquo;按用户发放&rdquo;、&ldquo;按商品发放&rdquo;、&ldquo;按订单金额发放&rdquo;、&ldquo;线下发放的红包&rdquo;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;9.2.1、按用户发放：可以控制该红包发送给哪些会员&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 12px; color: rgb(127, 127, 127);&quot;&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;9.2.2、按商品方法：可以控制用户购买哪些商品时可以获得该红包&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px; color: rgb(127, 127, 127);&quot;&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;9.2.3、按订单金额方法：可以控制用户购买商品满多少元时可以获得该红包&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 12px; color: rgb(127, 127, 127);&quot;&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;&lt;span style=&quot;font-size: 12px; color: rgb(0, 0, 0);&quot;&gt;9.2.4、线下发放：属于线下发放的红包，直接将该红包序列号发送给用户，用户凭借该序列号即可使用该红包了&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', '', '', '', '2', '1', '', '0', '', null, '2016-09-07 23:31:12', '2016-09-07 23:31:12');
INSERT INTO `syrator_article` VALUES ('82', '0', '', '&lt;p&gt;github:&lt;a href=&quot;https://github.com/stevenyangecho/laravel-u-editor&quot;&gt;https://github.com/stevenyangecho/laravel-u-editor&lt;/a&gt;&lt;/p&gt;&lt;p&gt;Laravel 5 &nbsp;UEditor&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;http://ueditor.baidu.com&quot;&gt;UEditor&lt;/a&gt; 是由百度web前端研发部开发所见即所得富文本web编辑器&lt;/p&gt;&lt;p&gt;此包为laravel5的支持,新增多语言配置,可自由部署前端代码,默认基于 UEditor 1.4.3.&lt;/p&gt;&lt;p&gt;UEditor 前台文件完全无修改,可自由gulp等工具部署到生产环境&lt;/p&gt;&lt;p&gt;根据系统的config.app.locale自动切换多语言. 暂时只支持 en,zh_CN,zh_TW&lt;/p&gt;&lt;p&gt;支持本地和七牛云存储,默认为本地上传 public/uploads&lt;/p&gt;&lt;h2&gt;ChangeLog&lt;/h2&gt;&lt;p&gt;1.1 版 增加七牛云存储的支持&lt;/p&gt;&lt;h2&gt;Installation&lt;/h2&gt;&lt;p&gt;&lt;a href=&quot;https://php.net&quot;&gt;PHP&lt;/a&gt; 5.4+ , and &lt;a href=&quot;https://getcomposer.org&quot;&gt;Composer&lt;/a&gt; are required.&lt;/p&gt;&lt;p&gt;To get the latest version of Laravel Exceptions, simply add the following line to the require block of your &lt;code&gt;composer.json&lt;/code&gt; file:&lt;/p&gt;&lt;pre&gt;&quot;stevenyangecho/laravel-u-editor&quot;:&nbsp;&quot;~1.1&quot;&lt;/pre&gt;&lt;p&gt;You&#39;ll then need to run &lt;code&gt;composer install&lt;/code&gt; or &lt;code&gt;composer update&lt;/code&gt; to download it and have the autoloader updated.&lt;/p&gt;&lt;p&gt;Once Laravel Exceptions is installed, you need to register the service provider. Open up &lt;code&gt;config/app.php&lt;/code&gt; and add the following to the &lt;code&gt;providers&lt;/code&gt; key.&lt;/p&gt;&lt;ul class=&quot; list-paddingleft-2&quot;&gt;&lt;li&gt;&lt;p&gt;&lt;code&gt;&#39;Stevenyangecho\\UEditor\\UEditorServiceProvider&#39;&lt;/code&gt;&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;then run&lt;/p&gt;&lt;ul class=&quot; list-paddingleft-2&quot;&gt;&lt;li&gt;&lt;p&gt;&lt;code&gt;php artisan vendor:publish&lt;/code&gt;&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;h2&gt;Configuration&lt;/h2&gt;&lt;p&gt;in config/laravel-u-editor.php u can configuration ,&lt;/p&gt;&lt;pre&gt;&nbsp;&nbsp;&nbsp;&nbsp;&#39;core&#39;&nbsp;=&gt;&nbsp;[\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;route&#39;&nbsp;=&gt;&nbsp;[\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;middleware&#39;&nbsp;=&gt;&nbsp;&#39;auth&#39;,\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;],\r\n&nbsp;&nbsp;&nbsp;&nbsp;],&lt;/pre&gt;&lt;p&gt;the middleware is important!&lt;/p&gt;&lt;p&gt;public/laravel-u-editor/ will &nbsp;have &nbsp;the &nbsp;full UEditor assets.&lt;/p&gt;&lt;h2&gt;Usage&lt;/h2&gt;&lt;p&gt;in &nbsp;your \\&lt;/p&gt;&lt;p&gt;block just put&lt;/p&gt;&lt;pre&gt;@include(&#39;UEditor::head&#39;);&lt;/pre&gt;&lt;p&gt;it will require &nbsp;assets.&lt;/p&gt;&lt;p&gt;if need,u can change the resources\\views\\vendor\\UEditor\\head.blade.php&lt;/p&gt;&lt;pre&gt;to&nbsp;fit&nbsp;your&nbsp;customization&nbsp;.&lt;/pre&gt;&lt;p&gt;ok,all done.just use the UEditor.&lt;/p&gt;&lt;pre&gt;&lt;!--&nbsp;加载编辑器的容器&nbsp;--&gt;\r\n&lt;script&nbsp;id=&quot;container&quot;&nbsp;name=&quot;content&quot;&nbsp;type=&quot;text/plain&quot;&gt;\r\n&nbsp;&nbsp;&nbsp;&nbsp;这里写你的初始化内容\r\n&lt;/script&gt;\r\n\r\n&lt;!--&nbsp;实例化编辑器&nbsp;--&gt;\r\n&lt;script&nbsp;type=&quot;text/javascript&quot;&gt;\r\n&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;ue&nbsp;=&nbsp;UE.getEditor(&#39;container&#39;);\r\n&lt;/script&gt;&lt;/pre&gt;&lt;p&gt;The detail useage Please see &lt;a href=&quot;http://ueditor.baidu.com&quot;&gt;http://ueditor.baidu.com&lt;/a&gt; &lt;/p&gt;&lt;h2&gt;License&lt;/h2&gt;', '', '', '', '2', '1', '', '0', '', null, '2016-09-07 23:32:12', '2016-09-07 23:32:12');
INSERT INTO `syrator_article` VALUES ('83', '0', '', '&lt;p&gt;dfdfdsweer的实打实大声道&lt;br/&gt;&lt;/p&gt;', '', '', '', '2', '1', '', '0', '', null, '2016-09-08 20:23:02', '2016-09-08 22:27:29');

-- ----------------------------
-- Table structure for syrator_article_cat
-- ----------------------------
DROP TABLE IF EXISTS `syrator_article_cat`;
CREATE TABLE `syrator_article_cat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `desc` varchar(255) NOT NULL DEFAULT '',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '50',
  `show_in_nav` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `path_name` varchar(100) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_type` (`type`),
  KEY `sort_order` (`sort_order`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

-- ----------------------------
-- Records of syrator_article_cat
-- ----------------------------
INSERT INTO `syrator_article_cat` VALUES ('1', '系统分类', '2', '', '系统保留分类', '50', '0', '0', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('2', '网店信息', '3', '', '网店信息分类', '50', '0', '1', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('3', '网店帮助分类', '4', '', '网店帮助分类', '50', '0', '1', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('4', '开店必备', '1', '', '', '6', '0', '0', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('5', '新手上路 ', '5', '', '', '50', '0', '3', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('7', '配送方式 ', '5', '', '配送与支付 ', '50', '0', '3', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('8', '售后服务', '5', '', '', '50', '0', '3', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('9', '关于我们 ', '5', '', '联系我们 ', '50', '0', '3', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('10', '购物指南', '5', '', '', '50', '0', '3', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('11', '手机促销', '1', '', '', '50', '0', '0', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('12', '站内快讯', '1', '', '', '5', '0', '0', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('13', '生活百科', '1', '', '', '4', '0', '0', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('14', '今日聚焦', '1', '', '', '2', '0', '0', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('16', '公司动态', '1', '', '', '1', '0', '0', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('17', '广告1210*100', '1', '', '', '50', '0', '0', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('18', '行业聚焦', '1', '', '', '3', '0', '0', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('19', '供货商通知文章', '99', '', '', '50', '0', '0', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_article_cat` VALUES ('20', '广告354*454', '1', '', '', '50', '0', '0', '', '2016-08-31 11:04:14', '2016-08-31 11:04:14');

-- ----------------------------
-- Table structure for syrator_member
-- ----------------------------
DROP TABLE IF EXISTS `syrator_member`;
CREATE TABLE `syrator_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) NOT NULL DEFAULT '' COMMENT '手机号',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `account` varchar(255) NOT NULL DEFAULT '' COMMENT '账号',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
  `remember_token` varchar(255) DEFAULT '',
  `nickname` varchar(255) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `role` int(10) DEFAULT NULL,
  `aite_id` text NOT NULL,
  `is_surplus_open` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否开启余额支付密码功能',
  `surplus_password` varchar(32) NOT NULL COMMENT '余额支付密码',
  `question` varchar(255) NOT NULL DEFAULT '',
  `answer` varchar(255) NOT NULL DEFAULT '',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `user_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `frozen_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pay_points` int(10) unsigned NOT NULL DEFAULT '0',
  `rank_points` int(10) unsigned NOT NULL DEFAULT '0',
  `address_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(11) unsigned NOT NULL DEFAULT '0',
  `last_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` varchar(15) NOT NULL DEFAULT '',
  `visit_count` smallint(5) unsigned NOT NULL DEFAULT '0',
  `user_rank` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `is_special` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ec_salt` varchar(10) DEFAULT NULL,
  `salt` varchar(10) NOT NULL DEFAULT '0',
  `parent_id` mediumint(9) NOT NULL DEFAULT '0',
  `flag` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `alias` varchar(60) NOT NULL,
  `msn` varchar(60) NOT NULL,
  `qq` varchar(20) NOT NULL,
  `office_phone` varchar(20) NOT NULL,
  `home_phone` varchar(20) NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `is_validated` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `validated` int(11) NOT NULL,
  `credit_line` decimal(10,2) unsigned NOT NULL,
  `passwd_question` varchar(50) DEFAULT NULL,
  `passwd_answer` varchar(255) DEFAULT NULL,
  `is_fenxiao` tinyint(1) NOT NULL,
  `real_name` varchar(255) NOT NULL,
  `card` varchar(255) NOT NULL,
  `face_card` varchar(255) NOT NULL,
  `back_card` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `province` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `mediaUID` varchar(50) NOT NULL,
  `mediaID` int(4) NOT NULL,
  `froms` char(10) NOT NULL DEFAULT 'pc' COMMENT 'pc:电脑,mobile:手机,app:应用',
  `headimg` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of syrator_member
-- ----------------------------
INSERT INTO `syrator_member` VALUES ('36', '18672764673', 'shul300@163.com', '18672764673', '$2y$10$RyIG.gqXlFDgEJ2JBd5Jku7z2uIAzXEkrMvjeOb1gQ0c.smjCZmPi', '', '小胖', '2', '', '0', '', '', '', '0', '0000-00-00', '0.00', '0.00', '0', '0', '0', '0', '0', '0000-00-00 00:00:00', '', '0', '0', '0', null, '0', '0', '0', '', '', '', '', '', '', '0', '0', '0.00', null, null, '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '0', 'pc', '', '2016-11-01 21:37:44', '2016-12-14 22:03:08');
INSERT INTO `syrator_member` VALUES ('42', '18672764675', 'shuwhu@qq.com', 'asdsdsdsd', '$2y$10$taMY6Ab9mLlg6XGP/lYB2us73pwAIUSp1ZnSEKvmvJkU7NQv7Faxu', '', 'asdasdsdsas', '8', '', '0', '', '', '', '0', '0000-00-00', '0.00', '0.00', '0', '0', '0', '0', '0', '0000-00-00 00:00:00', '', '0', '0', '0', null, '0', '0', '0', '', '', '', '', '', '', '0', '0', '0.00', null, null, '0', '', '', '', '', '0', '0', '0', '0', '', '0', '', '0', 'pc', '', '2016-12-14 23:28:08', '2016-12-15 01:29:46');

-- ----------------------------
-- Table structure for syrator_member_rank
-- ----------------------------
DROP TABLE IF EXISTS `syrator_member_rank`;
CREATE TABLE `syrator_member_rank` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `min_points` int(10) unsigned NOT NULL DEFAULT '0',
  `max_points` int(10) unsigned NOT NULL DEFAULT '0',
  `discount` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `show_price` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `special_rank` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_recomm` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='会员分组';

-- ----------------------------
-- Records of syrator_member_rank
-- ----------------------------
INSERT INTO `syrator_member_rank` VALUES ('1', '普通会员1', '0', '999', '100', '0', '0', '0', '2016-12-15 01:16:57', '2016-12-15 01:41:19');
INSERT INTO `syrator_member_rank` VALUES ('2', '铜牌会员', '1000', '5999', '95', '1', '0', '0', '2016-12-15 01:16:57', '2016-12-15 01:16:57');
INSERT INTO `syrator_member_rank` VALUES ('3', '金牌会员', '6000', '9999', '90', '1', '0', '0', '2016-12-15 01:16:57', '2016-12-15 01:16:57');
INSERT INTO `syrator_member_rank` VALUES ('6', '设计师', '0', '0', '0', '1', '0', '0', '2016-12-15 01:16:57', '2016-12-15 01:16:57');
INSERT INTO `syrator_member_rank` VALUES ('7', '工长', '0', '0', '0', '1', '0', '0', '2016-12-15 01:20:56', '2016-12-15 01:20:56');
INSERT INTO `syrator_member_rank` VALUES ('8', '监理', '0', '0', '0', '1', '0', '0', '2016-12-15 01:29:25', '2016-12-15 01:29:25');

-- ----------------------------
-- Table structure for syrator_password_resets
-- ----------------------------
DROP TABLE IF EXISTS `syrator_password_resets`;
CREATE TABLE `syrator_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='重置密码';

-- ----------------------------
-- Records of syrator_password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for syrator_permissions
-- ----------------------------
DROP TABLE IF EXISTS `syrator_permissions`;
CREATE TABLE `syrator_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='权限表';

-- ----------------------------
-- Records of syrator_permissions
-- ----------------------------
INSERT INTO `syrator_permissions` VALUES ('1', '@member', '会员', '颠三倒四', '2016-04-08 12:28:17', '2016-12-15 15:09:08');
INSERT INTO `syrator_permissions` VALUES ('2', 'member-show', '会员查看', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `syrator_permissions` VALUES ('3', 'member-block', '会员冻结', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `syrator_permissions` VALUES ('4', 'member-search', '会员搜索', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `syrator_permissions` VALUES ('5', '@article', '文章', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `syrator_permissions` VALUES ('6', 'article-show', '文章查看', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `syrator_permissions` VALUES ('7', 'article-write', '文章写入', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `syrator_permissions` VALUES ('8', 'article-search', '文章搜索', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `syrator_permissions` VALUES ('9', '@category', '分类', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `syrator_permissions` VALUES ('10', 'category-show', '分类查看', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `syrator_permissions` VALUES ('11', 'category-write', '分类写入', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `syrator_permissions` VALUES ('12', '@me', '个人资料', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `syrator_permissions` VALUES ('13', 'me-write', '个人资料写入', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `syrator_permissions` VALUES ('14', '@user', '用户', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `syrator_permissions` VALUES ('15', 'user-write', '用户写入', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `syrator_permissions` VALUES ('16', 'user-search', '用户搜索', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `syrator_permissions` VALUES ('17', '@role', '角色', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `syrator_permissions` VALUES ('18', 'role-write', '角色写入', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `syrator_permissions` VALUES ('19', '@permission', '权限', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `syrator_permissions` VALUES ('20', '@option', '系统配置', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `syrator_permissions` VALUES ('21', 'option-write', '系统配置写入', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `syrator_permissions` VALUES ('22', '@log', '系统日志', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `syrator_permissions` VALUES ('23', 'log-show', '系统日志查看', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `syrator_permissions` VALUES ('24', 'log-search', '系统日志搜索', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `syrator_permissions` VALUES ('25', 'me-inforation', '个人资料', '个人资料管理，昵称等', '2016-08-26 16:44:32', '2016-12-16 16:15:46');
INSERT INTO `syrator_permissions` VALUES ('26', 'me-password', '修改密码', '修改个人的密码', '2016-08-26 18:13:10', '2016-12-16 16:16:04');
INSERT INTO `syrator_permissions` VALUES ('27', 'article-cat', '文章分类', '文章分类管理', '2016-09-01 19:16:00', '2016-09-01 22:37:43');
INSERT INTO `syrator_permissions` VALUES ('28', 'article-manage', '文章管理', '文章管理，文章增删改查', '2016-09-01 19:16:46', '2016-12-16 16:16:20');

-- ----------------------------
-- Table structure for syrator_permission_role
-- ----------------------------
DROP TABLE IF EXISTS `syrator_permission_role`;
CREATE TABLE `syrator_permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='角色权限对应表';

-- ----------------------------
-- Records of syrator_permission_role
-- ----------------------------
INSERT INTO `syrator_permission_role` VALUES ('5', '1');
INSERT INTO `syrator_permission_role` VALUES ('6', '1');
INSERT INTO `syrator_permission_role` VALUES ('7', '1');
INSERT INTO `syrator_permission_role` VALUES ('8', '1');
INSERT INTO `syrator_permission_role` VALUES ('9', '1');
INSERT INTO `syrator_permission_role` VALUES ('10', '1');
INSERT INTO `syrator_permission_role` VALUES ('11', '1');
INSERT INTO `syrator_permission_role` VALUES ('12', '1');
INSERT INTO `syrator_permission_role` VALUES ('13', '1');
INSERT INTO `syrator_permission_role` VALUES ('14', '1');
INSERT INTO `syrator_permission_role` VALUES ('15', '1');
INSERT INTO `syrator_permission_role` VALUES ('16', '1');
INSERT INTO `syrator_permission_role` VALUES ('17', '1');
INSERT INTO `syrator_permission_role` VALUES ('18', '1');
INSERT INTO `syrator_permission_role` VALUES ('19', '1');
INSERT INTO `syrator_permission_role` VALUES ('20', '1');
INSERT INTO `syrator_permission_role` VALUES ('21', '1');
INSERT INTO `syrator_permission_role` VALUES ('22', '1');
INSERT INTO `syrator_permission_role` VALUES ('23', '1');
INSERT INTO `syrator_permission_role` VALUES ('24', '1');
INSERT INTO `syrator_permission_role` VALUES ('25', '1');
INSERT INTO `syrator_permission_role` VALUES ('26', '1');
INSERT INTO `syrator_permission_role` VALUES ('27', '1');
INSERT INTO `syrator_permission_role` VALUES ('28', '1');
INSERT INTO `syrator_permission_role` VALUES ('1', '2');
INSERT INTO `syrator_permission_role` VALUES ('2', '2');
INSERT INTO `syrator_permission_role` VALUES ('3', '2');
INSERT INTO `syrator_permission_role` VALUES ('4', '2');
INSERT INTO `syrator_permission_role` VALUES ('5', '2');
INSERT INTO `syrator_permission_role` VALUES ('6', '2');
INSERT INTO `syrator_permission_role` VALUES ('7', '2');
INSERT INTO `syrator_permission_role` VALUES ('8', '2');
INSERT INTO `syrator_permission_role` VALUES ('9', '2');
INSERT INTO `syrator_permission_role` VALUES ('10', '2');
INSERT INTO `syrator_permission_role` VALUES ('11', '2');
INSERT INTO `syrator_permission_role` VALUES ('12', '2');
INSERT INTO `syrator_permission_role` VALUES ('13', '2');
INSERT INTO `syrator_permission_role` VALUES ('14', '2');
INSERT INTO `syrator_permission_role` VALUES ('15', '2');
INSERT INTO `syrator_permission_role` VALUES ('16', '2');
INSERT INTO `syrator_permission_role` VALUES ('17', '2');
INSERT INTO `syrator_permission_role` VALUES ('18', '2');
INSERT INTO `syrator_permission_role` VALUES ('19', '2');
INSERT INTO `syrator_permission_role` VALUES ('20', '2');
INSERT INTO `syrator_permission_role` VALUES ('21', '2');
INSERT INTO `syrator_permission_role` VALUES ('22', '2');
INSERT INTO `syrator_permission_role` VALUES ('23', '2');
INSERT INTO `syrator_permission_role` VALUES ('24', '2');
INSERT INTO `syrator_permission_role` VALUES ('25', '2');
INSERT INTO `syrator_permission_role` VALUES ('26', '2');
INSERT INTO `syrator_permission_role` VALUES ('27', '2');
INSERT INTO `syrator_permission_role` VALUES ('28', '2');
INSERT INTO `syrator_permission_role` VALUES ('1', '10');
INSERT INTO `syrator_permission_role` VALUES ('2', '10');
INSERT INTO `syrator_permission_role` VALUES ('3', '10');
INSERT INTO `syrator_permission_role` VALUES ('4', '10');
INSERT INTO `syrator_permission_role` VALUES ('5', '10');
INSERT INTO `syrator_permission_role` VALUES ('6', '10');
INSERT INTO `syrator_permission_role` VALUES ('7', '10');
INSERT INTO `syrator_permission_role` VALUES ('8', '10');
INSERT INTO `syrator_permission_role` VALUES ('9', '10');
INSERT INTO `syrator_permission_role` VALUES ('10', '10');
INSERT INTO `syrator_permission_role` VALUES ('11', '10');
INSERT INTO `syrator_permission_role` VALUES ('12', '10');
INSERT INTO `syrator_permission_role` VALUES ('13', '10');
INSERT INTO `syrator_permission_role` VALUES ('14', '10');
INSERT INTO `syrator_permission_role` VALUES ('15', '10');
INSERT INTO `syrator_permission_role` VALUES ('16', '10');
INSERT INTO `syrator_permission_role` VALUES ('17', '10');
INSERT INTO `syrator_permission_role` VALUES ('18', '10');
INSERT INTO `syrator_permission_role` VALUES ('19', '10');
INSERT INTO `syrator_permission_role` VALUES ('20', '10');
INSERT INTO `syrator_permission_role` VALUES ('21', '10');
INSERT INTO `syrator_permission_role` VALUES ('22', '10');
INSERT INTO `syrator_permission_role` VALUES ('23', '10');
INSERT INTO `syrator_permission_role` VALUES ('24', '10');
INSERT INTO `syrator_permission_role` VALUES ('25', '10');
INSERT INTO `syrator_permission_role` VALUES ('26', '10');
INSERT INTO `syrator_permission_role` VALUES ('27', '10');
INSERT INTO `syrator_permission_role` VALUES ('28', '10');

-- ----------------------------
-- Table structure for syrator_roles
-- ----------------------------
DROP TABLE IF EXISTS `syrator_roles`;
CREATE TABLE `syrator_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='后台角色表';

-- ----------------------------
-- Records of syrator_roles
-- ----------------------------
INSERT INTO `syrator_roles` VALUES ('1', 'Admin', '管理员', '系统管理员，负责系统的管理工作', '2016-03-03 17:05:04', '2016-12-15 15:52:37');
INSERT INTO `syrator_roles` VALUES ('2', 'Founder', '创始人', '', '2016-03-08 17:05:52', '2016-12-15 15:52:30');
INSERT INTO `syrator_roles` VALUES ('10', 'demo', '演示账号', null, '2016-12-18 20:31:02', '2016-12-18 20:31:02');

-- ----------------------------
-- Table structure for syrator_role_user
-- ----------------------------
DROP TABLE IF EXISTS `syrator_role_user`;
CREATE TABLE `syrator_role_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='后台角色与用户对应表';

-- ----------------------------
-- Records of syrator_role_user
-- ----------------------------
INSERT INTO `syrator_role_user` VALUES ('1', '1', '1');
INSERT INTO `syrator_role_user` VALUES ('17', '2', '1');
INSERT INTO `syrator_role_user` VALUES ('21', '4', '1');
INSERT INTO `syrator_role_user` VALUES ('23', '5', '1');
INSERT INTO `syrator_role_user` VALUES ('24', '3', '1');

-- ----------------------------
-- Table structure for syrator_sms_logs
-- ----------------------------
DROP TABLE IF EXISTS `syrator_sms_logs`;
CREATE TABLE `syrator_sms_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '短信日志id',
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '手机号',
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '操作类型',
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '操作发起的url',
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '操作内容',
  `vcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '验证码',
  `res` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '短信平台返回码',
  `operator_ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '操作者ip',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='短信验证码日志表';

-- ----------------------------
-- Records of syrator_sms_logs
-- ----------------------------
INSERT INTO `syrator_sms_logs` VALUES ('11', '18672764673', 'register', '//localhost:8801/api/member/sendverifycode', '您正在注册账户，验证码：738113。请尽快使用，勿要告知他人。', '738113', '1', '127.0.0.1', '2016-11-01 21:37:16', '2016-11-01 21:37:16');
INSERT INTO `syrator_sms_logs` VALUES ('12', '18672764673', 'resetpassword', '//localhost:8801/api/member/sendverifycode', '您正在注册账户，验证码：341864。请尽快使用，勿要告知他人。', '341864', '1', '127.0.0.1', '2016-11-01 21:38:37', '2016-11-01 21:38:37');

-- ----------------------------
-- Table structure for syrator_system_logs
-- ----------------------------
DROP TABLE IF EXISTS `syrator_system_logs`;
CREATE TABLE `syrator_system_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '系统日志id',
  `user_id` int(12) DEFAULT '0' COMMENT '用户id（为0表示系统级操作，其它一般为管理型用户操作）',
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'system' COMMENT '操作类型',
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT '-' COMMENT '操作发起的url',
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '操作内容',
  `operator_ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '操作者ip',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='系统日志表';

-- ----------------------------
-- Records of syrator_system_logs
-- ----------------------------
INSERT INTO `syrator_system_logs` VALUES ('1', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：syrator[admin@example.com] 登出系统。', '127.0.0.1', '2016-08-24 18:54:50', '2016-08-24 18:54:50');
INSERT INTO `syrator_system_logs` VALUES ('2', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：syrator[admin@example.com] 登录系统。', '127.0.0.1', '2016-08-24 18:54:56', '2016-08-24 18:54:56');
INSERT INTO `syrator_system_logs` VALUES ('3', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：syrator[admin@example.com] 登出系统。', '127.0.0.1', '2016-08-26 10:51:01', '2016-08-26 10:51:01');
INSERT INTO `syrator_system_logs` VALUES ('4', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：syrator[admin@example.com] 登录系统。', '127.0.0.1', '2016-08-26 10:51:05', '2016-08-26 10:51:05');
INSERT INTO `syrator_system_logs` VALUES ('5', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：syrator[admin@example.com] 登录系统。', '127.0.0.1', '2016-08-26 14:16:39', '2016-08-26 14:16:39');
INSERT INTO `syrator_system_logs` VALUES ('6', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：syrator[admin@example.com] 登录系统。', '127.0.0.1', '2016-08-29 23:35:18', '2016-08-29 23:35:18');
INSERT INTO `syrator_system_logs` VALUES ('7', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：syrator[admin@example.com] 登录系统。', '127.0.0.1', '2016-08-30 09:10:59', '2016-08-30 09:10:59');
INSERT INTO `syrator_system_logs` VALUES ('8', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：syrator[admin@example.com] 登出系统。', '127.0.0.1', '2016-08-31 11:03:44', '2016-08-31 11:03:44');
INSERT INTO `syrator_system_logs` VALUES ('9', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：syrator[admin@example.com] 登录系统。', '127.0.0.1', '2016-08-31 11:03:57', '2016-08-31 11:03:57');
INSERT INTO `syrator_system_logs` VALUES ('10', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：syrator[admin@example.com] 登出系统。', '127.0.0.1', '2016-08-31 11:04:14', '2016-08-31 11:04:14');
INSERT INTO `syrator_system_logs` VALUES ('11', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：syrator[admin@example.com] 登录系统。', '127.0.0.1', '2016-08-31 11:04:20', '2016-08-31 11:04:20');
INSERT INTO `syrator_system_logs` VALUES ('12', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：syrator[admin@example.com] 登录系统。', '127.0.0.1', '2016-08-31 14:24:13', '2016-08-31 14:24:13');
INSERT INTO `syrator_system_logs` VALUES ('13', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：syrator[admin@example.com] 登出系统。', '127.0.0.1', '2016-09-12 10:32:55', '2016-09-12 10:32:55');
INSERT INTO `syrator_system_logs` VALUES ('14', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：syrator[admin@example.com] 登录系统。', '127.0.0.1', '2016-09-12 10:33:00', '2016-09-12 10:33:00');
INSERT INTO `syrator_system_logs` VALUES ('15', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：syrator[admin@example.com] 登出系统。', '127.0.0.1', '2016-09-18 11:59:52', '2016-09-18 11:59:52');
INSERT INTO `syrator_system_logs` VALUES ('16', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：syrator[admin@example.com] 登录系统。', '127.0.0.1', '2016-09-18 14:55:01', '2016-09-18 14:55:01');
INSERT INTO `syrator_system_logs` VALUES ('17', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '127.0.0.1', '2016-09-22 17:17:58', '2016-09-22 17:17:58');
INSERT INTO `syrator_system_logs` VALUES ('18', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：admin[admin@example.com] 登出系统。', '127.0.0.1', '2016-09-23 11:02:58', '2016-09-23 11:02:58');
INSERT INTO `syrator_system_logs` VALUES ('19', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '127.0.0.1', '2016-09-23 11:03:04', '2016-09-23 11:03:04');
INSERT INTO `syrator_system_logs` VALUES ('20', '1', 'management', '-', '管理员：成功新增一名管理用户admin2<2212073083@qq.com>。', '127.0.0.1', '2016-09-23 14:21:51', '2016-09-23 14:21:51');
INSERT INTO `syrator_system_logs` VALUES ('21', '1', 'management', '-', '管理员：成功新增模板desktop<默认模板>。', '127.0.0.1', '2016-09-24 21:33:30', '2016-09-24 21:33:30');
INSERT INTO `syrator_system_logs` VALUES ('22', '1', 'management', '-', '管理员：成功新增模板desktop<默认模板>。', '127.0.0.1', '2016-09-25 00:19:42', '2016-09-25 00:19:42');
INSERT INTO `syrator_system_logs` VALUES ('23', '1', 'management', '-', '管理员：成功新增模板jidong<京东模板>。', '127.0.0.1', '2016-09-25 00:41:54', '2016-09-25 00:41:54');
INSERT INTO `syrator_system_logs` VALUES ('24', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '127.0.0.1', '2016-09-29 16:36:52', '2016-09-29 16:36:52');
INSERT INTO `syrator_system_logs` VALUES ('25', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：admin[admin@example.com] 登出系统。', '127.0.0.1', '2016-10-27 21:41:33', '2016-10-27 21:41:33');
INSERT INTO `syrator_system_logs` VALUES ('26', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '127.0.0.1', '2016-10-27 21:42:11', '2016-10-27 21:42:11');
INSERT INTO `syrator_system_logs` VALUES ('27', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '127.0.0.1', '2016-11-11 14:33:02', '2016-11-11 14:33:02');
INSERT INTO `syrator_system_logs` VALUES ('28', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-11-17 16:24:27', '2016-11-17 16:24:27');
INSERT INTO `syrator_system_logs` VALUES ('29', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-11-23 09:59:30', '2016-11-23 09:59:30');
INSERT INTO `syrator_system_logs` VALUES ('30', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-11-25 14:31:51', '2016-11-25 14:31:51');
INSERT INTO `syrator_system_logs` VALUES ('31', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-11-29 10:55:54', '2016-11-29 10:55:54');
INSERT INTO `syrator_system_logs` VALUES ('32', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-11-29 11:15:45', '2016-11-29 11:15:45');
INSERT INTO `syrator_system_logs` VALUES ('33', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-11-29 11:16:12', '2016-11-29 11:16:12');
INSERT INTO `syrator_system_logs` VALUES ('34', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-11-29 11:21:41', '2016-11-29 11:21:41');
INSERT INTO `syrator_system_logs` VALUES ('35', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-01 01:08:35', '2016-12-01 01:08:35');
INSERT INTO `syrator_system_logs` VALUES ('36', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：aaa.jpg，上传之后保存在服务器路径为/uploads/content/20161201/583ffb2a36341_54o.jpg。', '::1', '2016-12-01 18:27:54', '2016-12-01 18:27:54');
INSERT INTO `syrator_system_logs` VALUES ('37', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-02 17:53:44', '2016-12-02 17:53:44');
INSERT INTO `syrator_system_logs` VALUES ('38', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：admin[admin@example.com] 登出系统。', '::1', '2016-12-05 09:23:39', '2016-12-05 09:23:39');
INSERT INTO `syrator_system_logs` VALUES ('39', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-05 09:24:56', '2016-12-05 09:24:56');
INSERT INTO `syrator_system_logs` VALUES ('40', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：admin[admin@example.com] 登出系统。', '::1', '2016-12-05 09:25:06', '2016-12-05 09:25:06');
INSERT INTO `syrator_system_logs` VALUES ('41', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-05 11:36:58', '2016-12-05 11:36:58');
INSERT INTO `syrator_system_logs` VALUES ('42', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：admin[admin@example.com] 登出系统。', '::1', '2016-12-05 11:37:13', '2016-12-05 11:37:13');
INSERT INTO `syrator_system_logs` VALUES ('43', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-05 11:46:33', '2016-12-05 11:46:33');
INSERT INTO `syrator_system_logs` VALUES ('44', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：admin[admin@example.com] 登出系统。', '::1', '2016-12-05 11:46:45', '2016-12-05 11:46:45');
INSERT INTO `syrator_system_logs` VALUES ('45', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-05 15:13:14', '2016-12-05 15:13:14');
INSERT INTO `syrator_system_logs` VALUES ('46', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：admin[admin@example.com] 登出系统。', '::1', '2016-12-05 15:13:32', '2016-12-05 15:13:32');
INSERT INTO `syrator_system_logs` VALUES ('47', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-05 17:08:02', '2016-12-05 17:08:02');
INSERT INTO `syrator_system_logs` VALUES ('48', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：admin[admin@example.com] 登出系统。', '::1', '2016-12-05 17:12:49', '2016-12-05 17:12:49');
INSERT INTO `syrator_system_logs` VALUES ('49', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-05 17:35:50', '2016-12-05 17:35:50');
INSERT INTO `syrator_system_logs` VALUES ('50', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：admin[admin@example.com] 登出系统。', '::1', '2016-12-05 17:47:09', '2016-12-05 17:47:09');
INSERT INTO `syrator_system_logs` VALUES ('51', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-05 17:47:25', '2016-12-05 17:47:25');
INSERT INTO `syrator_system_logs` VALUES ('52', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-05 22:41:30', '2016-12-05 22:41:30');
INSERT INTO `syrator_system_logs` VALUES ('53', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-07 00:09:11', '2016-12-07 00:09:11');
INSERT INTO `syrator_system_logs` VALUES ('54', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-07 09:25:59', '2016-12-07 09:25:59');
INSERT INTO `syrator_system_logs` VALUES ('55', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-08 09:42:31', '2016-12-08 09:42:31');
INSERT INTO `syrator_system_logs` VALUES ('56', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-08 13:53:59', '2016-12-08 13:53:59');
INSERT INTO `syrator_system_logs` VALUES ('57', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片.jpg，上传之后保存在服务器路径为/uploads/content/20161208/58491e9bc57f4_31o.jpg。', '::1', '2016-12-08 16:49:31', '2016-12-08 16:49:31');
INSERT INTO `syrator_system_logs` VALUES ('58', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片.jpg，上传之后保存在服务器路径为/uploads/content/20161208/584922dac639d_38o.jpg。', '::1', '2016-12-08 17:07:38', '2016-12-08 17:07:38');
INSERT INTO `syrator_system_logs` VALUES ('59', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片.jpg，上传之后保存在服务器路径为/uploads/content/20161208/5849238667a9c_30o.jpg。', '::1', '2016-12-08 17:10:30', '2016-12-08 17:10:30');
INSERT INTO `syrator_system_logs` VALUES ('60', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片.jpg，上传之后保存在服务器路径为/uploads/content/20161208/584923c7cde3d_35o.jpg。', '::1', '2016-12-08 17:11:35', '2016-12-08 17:11:35');
INSERT INTO `syrator_system_logs` VALUES ('61', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片.jpg，上传之后保存在服务器路径为/uploads/content/20161208/58492aacd02f3_00o.jpg。', '::1', '2016-12-08 17:41:00', '2016-12-08 17:41:00');
INSERT INTO `syrator_system_logs` VALUES ('62', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片.jpg，上传之后保存在服务器路径为/uploads/content/20161208/58492add11b1f_49o.jpg。', '::1', '2016-12-08 17:41:49', '2016-12-08 17:41:49');
INSERT INTO `syrator_system_logs` VALUES ('63', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片.jpg，上传之后保存在服务器路径为/uploads/content/20161208/58492ae252473_54o.jpg。', '::1', '2016-12-08 17:41:54', '2016-12-08 17:41:54');
INSERT INTO `syrator_system_logs` VALUES ('64', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片.jpg，上传之后保存在服务器路径为/uploads/content/20161208/58492b0cb6f87_36o.jpg。', '::1', '2016-12-08 17:42:36', '2016-12-08 17:42:36');
INSERT INTO `syrator_system_logs` VALUES ('65', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片.jpg，上传之后保存在服务器路径为/uploads/content/20161208/58492b284f79d_04o.jpg。', '::1', '2016-12-08 17:43:04', '2016-12-08 17:43:04');
INSERT INTO `syrator_system_logs` VALUES ('66', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片.jpg，上传之后保存在服务器路径为/uploads/content/20161208/58492b2f01dcb_11o.jpg。', '::1', '2016-12-08 17:43:11', '2016-12-08 17:43:11');
INSERT INTO `syrator_system_logs` VALUES ('67', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-08 23:00:27', '2016-12-08 23:00:27');
INSERT INTO `syrator_system_logs` VALUES ('68', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片.jpg，上传之后保存在服务器路径为/uploads/content/20161208/58498084b51d7_16o.jpg。', '::1', '2016-12-08 23:47:16', '2016-12-08 23:47:16');
INSERT INTO `syrator_system_logs` VALUES ('69', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片.jpg，上传之后保存在服务器路径为/uploads/content/20161209/584a0d0b386e4_51o.jpg。', '::1', '2016-12-09 09:46:51', '2016-12-09 09:46:51');
INSERT INTO `syrator_system_logs` VALUES ('70', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片.jpg，上传之后保存在服务器路径为/uploads/content/20161209/584a11d99c3b0_21o.jpg。', '::1', '2016-12-09 10:07:21', '2016-12-09 10:07:21');
INSERT INTO `syrator_system_logs` VALUES ('71', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片.jpg，上传之后保存在服务器路径为/uploads/content/20161209/584a13bebedf9_26o.jpg。', '::1', '2016-12-09 10:15:26', '2016-12-09 10:15:26');
INSERT INTO `syrator_system_logs` VALUES ('72', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片.jpg，上传之后保存在服务器路径为/uploads/content/20161209/584a15476abe2_59o.jpg。', '::1', '2016-12-09 10:21:59', '2016-12-09 10:21:59');
INSERT INTO `syrator_system_logs` VALUES ('73', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片2.jpg，上传之后保存在服务器路径为/uploads/content/20161209/584a169bae09b_39o.jpg。', '::1', '2016-12-09 10:27:39', '2016-12-09 10:27:39');
INSERT INTO `syrator_system_logs` VALUES ('74', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片2.jpg，上传之后保存在服务器路径为/uploads/content/20161209/584a1f891f00b_45o.jpg。', '::1', '2016-12-09 11:05:45', '2016-12-09 11:05:45');
INSERT INTO `syrator_system_logs` VALUES ('75', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片.jpg，上传之后保存在服务器路径为/uploads/content/20161209/584a20ba6edf7_50o.jpg。', '::1', '2016-12-09 11:10:50', '2016-12-09 11:10:50');
INSERT INTO `syrator_system_logs` VALUES ('76', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：上传图片2.jpg，上传之后保存在服务器路径为/uploads/content/20161209/584a20cc0504c_08o.jpg。', '::1', '2016-12-09 11:11:08', '2016-12-09 11:11:08');
INSERT INTO `syrator_system_logs` VALUES ('77', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-09 23:57:15', '2016-12-09 23:57:15');
INSERT INTO `syrator_system_logs` VALUES ('78', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-11 16:35:56', '2016-12-11 16:35:56');
INSERT INTO `syrator_system_logs` VALUES ('79', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-13 02:20:22', '2016-12-13 02:20:22');
INSERT INTO `syrator_system_logs` VALUES ('80', '1', 'management', '-', '管理员：成功新增模板jingdong<京东模板>。', '::1', '2016-12-13 02:34:54', '2016-12-13 02:34:54');
INSERT INTO `syrator_system_logs` VALUES ('81', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：avatar2.jpg，上传之后保存在服务器路径为/uploads/content/20161213/584fa9ff91236_51o.jpg。', '::1', '2016-12-13 15:57:51', '2016-12-13 15:57:51');
INSERT INTO `syrator_system_logs` VALUES ('82', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：avatar2.jpg，上传之后保存在服务器路径为/uploads/content/20161213/584fab1b87cae_35o.jpg。', '::1', '2016-12-13 16:02:35', '2016-12-13 16:02:35');
INSERT INTO `syrator_system_logs` VALUES ('83', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：avatar2.jpg，上传之后保存在服务器路径为/uploads/content/20161213/584fac398c2c7_21o.jpg。', '::1', '2016-12-13 16:07:21', '2016-12-13 16:07:21');
INSERT INTO `syrator_system_logs` VALUES ('84', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：avatar2.jpg，上传之后保存在服务器路径为/uploads/content/20161213/584fac7daf9db_29o.jpg。', '::1', '2016-12-13 16:08:29', '2016-12-13 16:08:29');
INSERT INTO `syrator_system_logs` VALUES ('85', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：avatar2.jpg，上传之后保存在服务器路径为/uploads/content/20161213/584fad7d7c8ff_45o.jpg。', '::1', '2016-12-13 16:12:45', '2016-12-13 16:12:45');
INSERT INTO `syrator_system_logs` VALUES ('86', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：shuwhu.jpg，上传之后保存在服务器路径为/uploads/content/20161213/584fadb9ce45a_45o.jpg。', '::1', '2016-12-13 16:13:45', '2016-12-13 16:13:45');
INSERT INTO `syrator_system_logs` VALUES ('87', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：shuwhu.jpg，上传之后保存在服务器路径为/uploads/content/20161213/584faf3498577_04o.jpg。', '::1', '2016-12-13 16:20:04', '2016-12-13 16:20:04');
INSERT INTO `syrator_system_logs` VALUES ('88', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：shuwhu.jpg，上传之后保存在服务器路径为/uploads/content/20161213/584fb034a444a_20o.jpg。', '::1', '2016-12-13 16:24:20', '2016-12-13 16:24:20');
INSERT INTO `syrator_system_logs` VALUES ('89', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：shuwhu.jpg，上传之后保存在服务器路径为/uploads/content/20161213/584fb0b3d6ca6_27o.jpg。', '::1', '2016-12-13 16:26:27', '2016-12-13 16:26:27');
INSERT INTO `syrator_system_logs` VALUES ('90', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：shuwhu.jpg，上传之后保存在服务器路径为/uploads/content/20161213/584fb41e03e85_02o.jpg。', '::1', '2016-12-13 16:41:02', '2016-12-13 16:41:02');
INSERT INTO `syrator_system_logs` VALUES ('91', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：shuwhu.jpg，上传之后保存在服务器路径为/uploads/content/20161213/584fb4b543779_33o.jpg。', '::1', '2016-12-13 16:43:33', '2016-12-13 16:43:33');
INSERT INTO `syrator_system_logs` VALUES ('92', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：shuwhu.jpg，上传之后保存在服务器路径为/uploads/content/20161213/584fb52237f76_22o.jpg。', '::1', '2016-12-13 16:45:22', '2016-12-13 16:45:22');
INSERT INTO `syrator_system_logs` VALUES ('93', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：shuwhu.jpg，上传之后保存在服务器路径为/uploads/content/20161213/584fb5671b4d0_31o.jpg。', '::1', '2016-12-13 16:46:31', '2016-12-13 16:46:31');
INSERT INTO `syrator_system_logs` VALUES ('94', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：shuwhu.jpg，上传之后保存在服务器路径为/uploads/content/20161213/584fb5e367b5e_35o.jpg。', '::1', '2016-12-13 16:48:35', '2016-12-13 16:48:35');
INSERT INTO `syrator_system_logs` VALUES ('95', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：avatar1_1.jpg，上传之后保存在服务器路径为/uploads/content/20161213/584fb64a05b58_18o.jpg。', '::1', '2016-12-13 16:50:18', '2016-12-13 16:50:18');
INSERT INTO `syrator_system_logs` VALUES ('96', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：admin[admin@example.com] 登出系统。', '::1', '2016-12-13 16:59:31', '2016-12-13 16:59:31');
INSERT INTO `syrator_system_logs` VALUES ('97', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-13 17:08:29', '2016-12-13 17:08:29');
INSERT INTO `syrator_system_logs` VALUES ('98', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：avatar1_1.jpg，上传之后保存在服务器路径为/uploads/content/20161213/584fbaa64770f_54o.jpg。', '::1', '2016-12-13 17:08:54', '2016-12-13 17:08:54');
INSERT INTO `syrator_system_logs` VALUES ('99', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：admin[admin@example.com] 登出系统。', '::1', '2016-12-13 17:19:07', '2016-12-13 17:19:07');
INSERT INTO `syrator_system_logs` VALUES ('100', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-13 17:19:28', '2016-12-13 17:19:28');
INSERT INTO `syrator_system_logs` VALUES ('101', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-13 23:21:10', '2016-12-13 23:21:10');
INSERT INTO `syrator_system_logs` VALUES ('102', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-14 09:44:31', '2016-12-14 09:44:31');
INSERT INTO `syrator_system_logs` VALUES ('103', '1', 'management', '-', '管理员：成功新增一名会员18672764674<>。', '::1', '2016-12-14 21:13:04', '2016-12-14 21:13:04');
INSERT INTO `syrator_system_logs` VALUES ('104', '1', 'management', '-', '管理员：成功新增一名会员18672764674<shul300@126.com>。', '::1', '2016-12-14 21:18:12', '2016-12-14 21:18:12');
INSERT INTO `syrator_system_logs` VALUES ('105', '1', 'management', '-', '管理员：成功新增一名会员18672764674<shul300@126.com>。', '::1', '2016-12-14 21:20:54', '2016-12-14 21:20:54');
INSERT INTO `syrator_system_logs` VALUES ('106', '1', 'management', '-', '管理员：成功新增一名会员18672764675<dskfdskfjkjf@qq.com>。', '::1', '2016-12-14 21:46:08', '2016-12-14 21:46:08');
INSERT INTO `syrator_system_logs` VALUES ('107', '1', 'management', '-', '管理员：成功新增一名会员18672764674<shul300@126.com>。', '::1', '2016-12-14 22:49:45', '2016-12-14 22:49:45');
INSERT INTO `syrator_system_logs` VALUES ('108', '1', 'management', '-', '管理员：成功新增一名会员18672764675<shuwhu@qq.com>。', '::1', '2016-12-14 23:28:08', '2016-12-14 23:28:08');
INSERT INTO `syrator_system_logs` VALUES ('109', '1', 'management', '-', '管理员：成功新增一名会员18672764673<shul300@163.com>。', '::1', '2016-12-14 23:47:03', '2016-12-14 23:47:03');
INSERT INTO `syrator_system_logs` VALUES ('110', '1', 'management', '-', '管理员：成功新增一名会员18672764673<shul300@163.com>。', '::1', '2016-12-14 23:47:55', '2016-12-14 23:47:55');
INSERT INTO `syrator_system_logs` VALUES ('111', '1', 'management', '-', '管理员：成功新增一名会员18672764673<shul300@163.com>。', '::1', '2016-12-14 23:48:13', '2016-12-14 23:48:13');
INSERT INTO `syrator_system_logs` VALUES ('112', '1', 'management', '-', '管理员：成功新增会员分组设计师<>。', '::1', '2016-12-15 01:16:57', '2016-12-15 01:16:57');
INSERT INTO `syrator_system_logs` VALUES ('113', '1', 'management', '-', '管理员：成功新增会员分组工长<>。', '::1', '2016-12-15 01:20:56', '2016-12-15 01:20:56');
INSERT INTO `syrator_system_logs` VALUES ('114', '1', 'management', '-', '管理员：成功新增会员分组监理<>。', '::1', '2016-12-15 01:29:25', '2016-12-15 01:29:25');
INSERT INTO `syrator_system_logs` VALUES ('115', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-15 09:18:08', '2016-12-15 09:18:08');
INSERT INTO `syrator_system_logs` VALUES ('116', '1', 'management', '-', '管理员：成功新增一名管理用户demo<demo@126.com>。', '::1', '2016-12-15 11:03:33', '2016-12-15 11:03:33');
INSERT INTO `syrator_system_logs` VALUES ('117', '1', 'management', '-', '管理员：成功新增一名管理用户demo2<shul300@163.com>。', '::1', '2016-12-15 11:17:38', '2016-12-15 11:17:38');
INSERT INTO `syrator_system_logs` VALUES ('118', '1', 'management', '-', '管理员：成功新增一名管理用户demo3<demo2@qq.com>。', '::1', '2016-12-15 11:22:52', '2016-12-15 11:22:52');
INSERT INTO `syrator_system_logs` VALUES ('119', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-15 14:14:54', '2016-12-15 14:14:54');
INSERT INTO `syrator_system_logs` VALUES ('120', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-15 23:05:34', '2016-12-15 23:05:34');
INSERT INTO `syrator_system_logs` VALUES ('121', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-18 12:57:16', '2016-12-18 12:57:16');
INSERT INTO `syrator_system_logs` VALUES ('122', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-18 20:28:51', '2016-12-18 20:28:51');
INSERT INTO `syrator_system_logs` VALUES ('123', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-19 01:31:29', '2016-12-19 01:31:29');
INSERT INTO `syrator_system_logs` VALUES ('124', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：admin[admin@example.com] 登出系统。', '::1', '2016-12-19 01:36:49', '2016-12-19 01:36:49');
INSERT INTO `syrator_system_logs` VALUES ('125', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-19 01:36:59', '2016-12-19 01:36:59');
INSERT INTO `syrator_system_logs` VALUES ('126', '1', 'session', '//localhost:8801/admin/auth/logout', '管理员：admin[admin@example.com] 登出系统。', '::1', '2016-12-19 01:37:28', '2016-12-19 01:37:28');
INSERT INTO `syrator_system_logs` VALUES ('127', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-21 01:23:27', '2016-12-21 01:23:27');
INSERT INTO `syrator_system_logs` VALUES ('128', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-21 09:45:24', '2016-12-21 09:45:24');
INSERT INTO `syrator_system_logs` VALUES ('129', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-21 23:41:20', '2016-12-21 23:41:20');
INSERT INTO `syrator_system_logs` VALUES ('130', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-24 13:45:43', '2016-12-24 13:45:43');
INSERT INTO `syrator_system_logs` VALUES ('131', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-27 14:17:14', '2016-12-27 14:17:14');
INSERT INTO `syrator_system_logs` VALUES ('132', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-27 17:15:20', '2016-12-27 17:15:20');
INSERT INTO `syrator_system_logs` VALUES ('133', '1', 'session', '//localhost:8801/admin/auth/login', '管理员：admin[admin@example.com] 登录系统。', '::1', '2016-12-29 16:30:59', '2016-12-29 16:30:59');
INSERT INTO `syrator_system_logs` VALUES ('134', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：avatar1.jpg，上传之后保存在服务器路径为/uploads/content/20170113/58787d2870776_28o.jpg。', '::1', '2017-01-13 15:09:28', '2017-01-13 15:09:28');
INSERT INTO `syrator_system_logs` VALUES ('135', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：20140905150429_u5WAr.thumb.700_0.jpg，上传之后保存在服务器路径为/uploads/content/20170113/58787d8331a73_59o.jpg。', '::1', '2017-01-13 15:10:59', '2017-01-13 15:10:59');
INSERT INTO `syrator_system_logs` VALUES ('136', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：20140905150429_u5WAr.thumb.700_0.jpg，上传之后保存在服务器路径为/uploads/content/20170113/58788229dae3c_49o.jpg。', '::1', '2017-01-13 15:30:49', '2017-01-13 15:30:49');
INSERT INTO `syrator_system_logs` VALUES ('137', '1', 'management', '-', '管理员：成功新增一张APP欢迎页<>。', '::1', '2017-01-13 15:33:00', '2017-01-13 15:33:00');
INSERT INTO `syrator_system_logs` VALUES ('138', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：20140905150455_Q3UVM.thumb.700_0.jpg，上传之后保存在服务器路径为/uploads/content/20170113/587883dddbc21_05o.jpg。', '::1', '2017-01-13 15:38:05', '2017-01-13 15:38:05');
INSERT INTO `syrator_system_logs` VALUES ('139', '1', 'management', '-', '管理员：成功新增一张APP欢迎页<>。', '::1', '2017-01-13 15:38:08', '2017-01-13 15:38:08');
INSERT INTO `syrator_system_logs` VALUES ('140', '1', 'upload', '//localhost:8801/admin/upload/picture', '管理员：上传了文件，文件原始文件名：20140913141520_Ydidj.thumb.700_0.jpg，上传之后保存在服务器路径为/uploads/content/20170113/58788db98038f_09o.jpg。', '::1', '2017-01-13 16:20:09', '2017-01-13 16:20:09');
INSERT INTO `syrator_system_logs` VALUES ('141', '1', 'management', '-', '管理员：成功新增一张APP欢迎页<>。', '::1', '2017-01-13 16:20:11', '2017-01-13 16:20:11');

-- ----------------------------
-- Table structure for syrator_system_options
-- ----------------------------
DROP TABLE IF EXISTS `syrator_system_options`;
CREATE TABLE `syrator_system_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '配置选项名',
  `value` text COLLATE utf8_unicode_ci COMMENT '配置选项值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `system_option_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='系统配置选项表';

-- ----------------------------
-- Records of syrator_system_options
-- ----------------------------
INSERT INTO `syrator_system_options` VALUES ('1', 'website_keywords', 'Syrator,CMS,B2C,B2B2C,电子商城');
INSERT INTO `syrator_system_options` VALUES ('2', 'company_address', '北京朝阳区');
INSERT INTO `syrator_system_options` VALUES ('3', 'website_title', 'Syrator');
INSERT INTO `syrator_system_options` VALUES ('4', 'company_telephone', '800-168-8888');
INSERT INTO `syrator_system_options` VALUES ('5', 'company_full_name', '史瑞特网络科技有限公司');
INSERT INTO `syrator_system_options` VALUES ('6', 'website_icp', '鄂ICP备15014911号');
INSERT INTO `syrator_system_options` VALUES ('7', 'system_version', '1.0');
INSERT INTO `syrator_system_options` VALUES ('8', 'page_size', '25');
INSERT INTO `syrator_system_options` VALUES ('9', 'system_logo', '/uploads/content/20161209/584a20cc0504c_08o.jpg');
INSERT INTO `syrator_system_options` VALUES ('10', 'picture_watermark', '/uploads/content/20161209/584a20ba6edf7_50o.jpg');
INSERT INTO `syrator_system_options` VALUES ('11', 'company_short_name', '史瑞特');
INSERT INTO `syrator_system_options` VALUES ('12', 'system_author', 'Recoding');
INSERT INTO `syrator_system_options` VALUES ('13', 'system_author_website', 'http://syrator.com');
INSERT INTO `syrator_system_options` VALUES ('14', 'is_watermark', '1');
INSERT INTO `syrator_system_options` VALUES ('15', 'website_description', '史瑞特网络科技有限公司描述');

-- ----------------------------
-- Table structure for syrator_theme
-- ----------------------------
DROP TABLE IF EXISTS `syrator_theme`;
CREATE TABLE `syrator_theme` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '配置选项名',
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '配置选项值',
  `author` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_current` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`name`,`code`),
  UNIQUE KEY `system_option_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='系统模板表';

-- ----------------------------
-- Records of syrator_theme
-- ----------------------------
INSERT INTO `syrator_theme` VALUES ('3', '默认模板', 'desktop', '小胖', '前台默认模板', '1.1', '0', '2016-09-25 00:19:42', '2016-12-12 22:08:45');
INSERT INTO `syrator_theme` VALUES ('5', '京东模板', 'jingdong', 'Recoding', '', '1.0', '1', '2016-12-13 02:34:54', '2016-12-13 02:35:18');

-- ----------------------------
-- Table structure for syrator_users
-- ----------------------------
DROP TABLE IF EXISTS `syrator_users`;
CREATE TABLE `syrator_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `realname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `is_locked` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1锁定,0正常',
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='管理员用户表';

-- ----------------------------
-- Records of syrator_users
-- ----------------------------
INSERT INTO `syrator_users` VALUES ('1', 'admin', 'admin@example.com', '$2y$10$rxVcc2STb3Fy.f1SqdRB5.UolDrvcyFT28qOwMz..tDGHA150F8fW', 'H6YVzrurx357tytXEx5hvLakezEsP2LIxUAYwMtvEWyZIXQk9GRYvdjMEUOL', 'admin', '18672764673', '小胖', '0', '/uploads/content/20161213/584fbaa64770f_54o.jpg', '2016-11-30 14:26:11', '2016-12-19 01:37:28');
INSERT INTO `syrator_users` VALUES ('3', 'demo', 'demo@126.com', '$2y$10$X1ChpKGNfUdmtMNicaRQh.Yam0ZWT6R6PcecudNoxlMMQVYOuC6cu', null, 'demoma', null, '马云', '0', null, '2016-12-15 11:03:33', '2016-12-15 11:51:24');
INSERT INTO `syrator_users` VALUES ('4', 'demo2', 'shul300@163.com', '$2y$10$nyBDv0o8f8q3b4kHk7b.Cen9VTT6MWzu29X93d8ouHVNrmeWCYvCi', null, 'demo2', null, '李彦宏', '0', null, '2016-12-15 11:17:38', '2016-12-15 11:17:38');
INSERT INTO `syrator_users` VALUES ('5', 'demo3', 'demo2@qq.com', '$2y$10$VKKlHEELb14Brr5XSIiXN.QWYIIQpPbHZ5Tu05F/SY3IE3lR9cNVG', null, 'demo3', '18672764798', '马化腾', '1', null, '2016-12-15 11:22:52', '2016-12-15 11:50:45');
SET FOREIGN_KEY_CHECKS=1;
