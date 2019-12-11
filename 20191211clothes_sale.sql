DROP DATABASE IF EXISTS clothes_sale;#建库
CREATE DATABASE clothes_sale;
USE clothes_sale;

CREATE TABLE staff_message(#员工信息
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	staff_no VARCHAR(32) NOT NULL DEFAULT '0000',#员工编码
	staff_name VARCHAR(32) NOT NULL DEFAULT 'UNDEFIED',#员工姓名
	staff_log_name VARCHAR(24) NOT NULL DEFAULT 'UNDEFIED',#员工登录名
	staff_password VARCHAR(64) NOT NULL DEFAULT '123456',#员工登录密码
	staff_permissions VARCHAR(24) NOT NULL DEFAULT '无权限',#员工权限，0无权限，1仓库管理，2销售管理，3财务管理，4权限管理
	gender VARCHAR(16) NOT NULL DEFAULT '未知',#员工性别，0男，1女
	telephone VARCHAR(15) DEFAULT '',#员工联系号码
	address VARCHAR(64) NOT NULL DEFAULT '',#员工住址
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(id)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

-- 添加默认员工
INSERT INTO staff_message(staff_no, staff_name, staff_log_name, staff_password, staff_permissions, gender, telephone, address) VALUES
('2019qweasdzxc123','李丽', 'Lily', 'lili1234', '无权限', '男', '', '中山大道东'),
('2019qweasdzxc124','周粥', 'Zhou', 'zhou1234', '仓库管理', '女', '', '中山大道南'),
('2019qweasdzxc125','陈辰', 'Chen', 'chen1234', '销售管理', '女', '', '中山大道西'),
('2019qweasdzxc126','章张', 'Zhang', 'zhang1234', '财务管理', '男', '', '中山大道北'),
('2019qweasdzxc127','吕旅', 'Luly', 'lv1234', '销售管理', '男', '', '中山大道中'),
('2019qweasdzxc128','工头', 'admin', 'admin', '权限管理', '女', '', '中山大道');


CREATE TABLE custom(#顾客信息
	custom_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	custom_no VARCHAR(32) NOT NULL UNIQUE,#顾客编码
	custom_name VARCHAR(32) NOT NULL,#顾客姓名
	telephone VARCHAR(15) DEFAULT '',#顾客联系号码
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(custom_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 添加默认顾客
INSERT INTO custom(custom_no, custom_name, telephone) VALUES
('qweasdzxc123', '张三', '1301123311'),
('qweasdzxc124', '李四', '1301123322'),
('qweasdzxc125', '王五', '1301123344');


CREATE TABLE goods_type(#商品类型
	type_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	type_name VARCHAR(64) NOT NULL,#商品类型名
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(type_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 添加默认商品
INSERT INTO goods_type(type_name) VALUES
('T恤'), ('裤子'), ('裙子'), ('衬衫');

CREATE TABLE supplier(#供应商信息
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	supplier_no VARCHAR(32) NOT NULL UNIQUE,#供应商编码
	supplier_name VARCHAR(64) NOT NULL,#供应商名称
	address VARCHAR(64) NOT NULL,#供应商地址
	contact VARCHAR(32) NOT NULL,#供应商联系人
	telephone VARCHAR(15) NOT NULL,#供应商联系号码
	remark TEXT,#备注
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 添加默认供应商
INSERT INTO supplier(supplier_no, supplier_name, address, contact, telephone, remark) VALUES
('2017123asdzxc', '广州裤子厂', '中山大道东', '郑正', '13011221234', '生产长裤'),
('2017123asdzxd', '广州毛衣厂', '中山大道南', '刘留', '13012321234', ''),
('2017123asdzxe', '广州裙子厂', '中山大道西', '朱珠', '13013421234', '生产裙子'),
('2017123asdzxf', '广州衬衫厂', '中山大道北', '罗螺', '13014521234', ''),
('2017123asdzxg', '广州布料厂', '中山大道中', '杨羊', '13015621234', '万能厂家');


CREATE TABLE goods_message(#商品基本信息
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	goods_no VARCHAR(32) NOT NULL UNIQUE,#商品编码
	supplier_id INT(10) UNSIGNED NOT NULL,#供应商id
	type_id INT(10) UNSIGNED NOT NULL,#商品类型id
	goods_name VARCHAR(64) NOT NULL,#商品名称
	metarial VARCHAR(32) NOT NULL,#商品材质
	remark TEXT,#备注
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(id),
	FOREIGN KEY(supplier_id) REFERENCES supplier(id),
	FOREIGN KEY(type_id) REFERENCES goods_type(type_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE goods_detail(#商品款式信息
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	detail_no VARCHAR(32) NOT NULL UNIQUE,#商品款式编码
	goods_id INT(10) UNSIGNED NOT NULL,#商品信息id
	detail_size VARCHAR(32) NOT NULL,#商品码数
	detail_color VARCHAR(32) NOT NULL,#商品颜色
	remark TEXT,#备注
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE purchase(#进货记录
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	purchase_no VARCHAR(32) NOT NULL UNIQUE,#进货编码
	detail_id INT(10) UNSIGNED NOT NULL,#商品id
	quantity int NOT NULL,#进货数量
	total_amount DECIMAL(6, 2) NOT NULL,#进货总支出
	purchase_date DATETIME NOT NULL,#进货日期
	operator INT(10) UNSIGNED NOT NULL,#进货操作人id
	remark TEXT,#备注
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(id),
	FOREIGN KEY(detail_id) REFERENCES goods_detail(id),
	FOREIGN KEY(operator) REFERENCES staff_message(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE saller_sales(#销售订单信息
	sell_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	sell_no VARCHAR(32) NOT NULL UNIQUE,#销售订单编码
	operator INT(10) UNSIGNED NOT NULL,#销售员id
	custom_id INT(10) UNSIGNED NOT NULL,#顾客id
	amount DECIMAL(6, 2) NOT NULL,#销售总金额
	sell_date DATETIME NOT NULL,#销售日期
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(sell_id),
	FOREIGN KEY(operator) REFERENCES staff_message(id),
	FOREIGN KEY(custom_id) REFERENCES custom(custom_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE sell_detail(#订单项目信息/销售订单每项内容
	detail_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	detail_no VARCHAR(32) NOT NULL UNIQUE,#订单编码
	sell_id INT(10) UNSIGNED NOT NULL,#销售订单id
	goods_id INT(10) UNSIGNED NOT NULL,#商品id
	quantity INT NOT NULL,#商品数量
	price DECIMAL(6,2) NOT NULL,#商品单价
	amount DECIMAL(6,2) NOT NULL,#订单总金额
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(detail_id),
	FOREIGN KEY(sell_id) REFERENCES saller_sales(sell_id),
	FOREIGN KEY(goods_id) REFERENCES goods_message(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE sell_return(#退货记录/退货信息
	return_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	return_no VARCHAR(32) NOT NULL UNIQUE,#
	detail_id INT(10) UNSIGNED NOT NULL,#销售订单详细信息id
	reason VARCHAR(128) NOT NULL,#退货原因
	return_date DATETIME NOT NULL,#退货日期
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(return_id),
	FOREIGN KEY(detail_id) REFERENCES sell_detail(detail_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE VIEW inventory #库存
AS SELECT
	table_in.detail_id AS detail_id, #商品详细信息id
	table_in.amount AS purchase_quantity, # 进货总数量
	COALESCE(table_out.amount, 0) AS sell_quantity, #销售总数量
	COALESCE(table_out.amount, 0) AS return_quantity, #退货总数量
	COALESCE((table_in.amount - table_out.amount + table_back.amount), COALESCE(table_in.amount - table_out.amount, table_in.amount)) as quantity #库存数量
FROM (SELECT detail_id, sum(quantity) amount from purchase GROUP by detail_id) table_in left join
	(SELECT detail_id, sum(quantity) amount from sell_detail GROUP by detail_id) table_out
		on table_in.detail_id = table_out.detail_id 
			left join 
			(select sell_detail.goods_id AS detail_id, sum(sell_detail.quantity) amount from sell_detail, sell_return WHERE sell_detail.detail_id=sell_return.detail_id GROUP by sell_detail.goods_id) table_back
	    	on table_back.detail_id = table_in.detail_id;
	    
CREATE TABLE account(#账目信息
	account_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	account_no VARCHAR(32) NOT NULL UNIQUE,#账目编码
	purchase_id INT(10) UNSIGNED NULL,#进货信息id
	sell_id INT(10) UNSIGNED NULL,#销售订单id
	return_id INT(10) UNSIGNED NULL,#退货信息id
	account_type int DEFAULT 0,#账目类型，0进货，1售货，2退货
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY(purchase_id) REFERENCES purchase(id),
	FOREIGN KEY(sell_id) REFERENCES saller_sales(sell_id),
	FOREIGN KEY(return_id) REFERENCES sell_return(return_id),
	PRIMARY KEY(account_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE public_message(
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	gender VARCHAR(16),
	permissions VARCHAR(24),
	PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO public_message(gender, permissions)
VALUES('男', '无权限'),('女', '仓库管理'), ('未知', '销售管理'), (NULL, '财务管理'), (NULL, '权限管理');

DROP USER IF EXISTS 'clothed_root'@'localhost';
CREATE USER 'clothed_root'@'localhost' IDENTIFIED BY '123456';
GRANT ALL ON clothes_sale.* TO 'clothed_root'@'localhost';
