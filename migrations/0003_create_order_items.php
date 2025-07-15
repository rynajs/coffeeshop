<?php
return [
    "CREATE TABLE IF NOT EXISTS order_items (
        id          INT AUTO_INCREMENT PRIMARY KEY,
        order_id    INT NOT NULL,
        product_id  INT NOT NULL,
        qty         INT NOT NULL,
        unit_price  DECIMAL(5,2) NOT NULL,
        line_total  DECIMAL(6,2) NOT NULL,
        CONSTRAINT fk_order   FOREIGN KEY (order_id)  REFERENCES orders(id),
        CONSTRAINT fk_product FOREIGN KEY (product_id) REFERENCES products(id)
    ) ENGINE=InnoDB"
];

