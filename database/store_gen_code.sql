DELIMITER $$

CREATE OR REPLACE
DEFINER = 'root'@'localhost'
PROCEDURE sp_KhoiTaoKyHieu (IN `p_MaKhoaChinh` varchar(50), OUT `p_MaKhoaChinh_d` varchar(55))
BEGIN
  DECLARE v_gia_tri_hien_tai int;
  DECLARE v_ky_hieu_bang varchar(20);

  -- Lấy data số mã hiện tại và ký hiệu của mã
  SELECT
    MaKhoaChinh,
    GiaTriHienTai INTO v_ky_hieu_bang, v_gia_tri_hien_tai
  FROM bang_ma_khoa_chinhs
  WHERE MaKhoaChinh = p_MaKhoaChinh COLLATE utf8mb4_unicode_ci FOR UPDATE;

  -- Concat lại chuỗi dùng LPAD để đảm bảo mã sinh ra có độ dài 10 ký tự VD: SP000000001, SP000000002
  -- SET p_MaKhoaChinh_d = CONCAT(v_ky_hieu_bang, LPAD(v_gia_tri_hien_tai, 9, "0"));

  SET p_MaKhoaChinh_d = CONCAT(v_ky_hieu_bang, LPAD(v_gia_tri_hien_tai, 12 - LENGTH(v_ky_hieu_bang), "0"));

  -- UPDATE lại giá trị tăng lên 1 cho lần tiếp theo lấy mã
  UPDATE bang_ma_khoa_chinhs
  SET GiaTriHienTai = GiaTriHienTai + 1
  WHERE MaKhoaChinh = p_MaKhoaChinh COLLATE utf8mb4_unicode_ci;
END
$$

DELIMITER ;
