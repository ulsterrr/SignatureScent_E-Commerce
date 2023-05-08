<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SanPham;
class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SP = new SanPham();
        $SP->MaSanPham = "SP00000001";
        $SP->TenSanPham = "Versace Eros For Men";
        $SP->ThuongHieu ="Versaces" ;
        $SP->TrangThai ="1" ;
        $SP->GiaTien = 1990000;
        $SP->MoTa = "Hương đầu: Bạc hà, Táo xanh, Quả chanh vàng.
        Hương giữa: Đậu Tonka, Ambroxan, Geranium.
        Hương cuối: Vanilla, Gỗ tuyết tùng, Cỏ hương bài, Rêu sồi.
        Không quá lời khi nói rằng, Versace Eros là mùi hương lấy lại vị thế cho nhà mốt lừng danh đến từ đất nước nước hình chiếc ủng trong thế kỷ 21. Tươi trẻ, sôi động và gợi cảm, đó là những tính từ có thể dùng để mô tả sát nghĩa nhất mùi hương nằm trong chai hương màu xanh đậm dấu ấn Địa Trung Hải này.
        Eros khởi đầu bằng mùi hương của Quả táo, một mùi hương Trái cây giòn tan, tươi tắn, được nhuộm vàng màu nắng bởi một Quả chanh vàng mọng nước. Bên cạnh Trái cây, Bạc hà the the, trẻ trung, phóng khoáng là nhân vật còn lại của điểm khởi đầu, đem theo một chút hậu vị ngọt ngọt nơi khoang mũi, để dẫn mùi hương của Eros vào với chủ điểm của nó, là sự ngọt ngào. Đậu Tonka, Vanilla quyện lấy nhau, một sự kết hợp ngọt ngào không xa lạ, khiến mùi hương trở nên mềm mại và gợi cảm hơn.
        Versace Eros Eau de Toilette là lựa chọn an toàn và hiệu quả cho mọi chàng trai trẻ trung, năng động, thích tiệc tùng và ưa ồn ào náo nhiệt.";
        $SP->HinhAnh = "";
        $SP->LoaiKichCo = "KC01";
        $SP->LoaiSanPham = "LSP01";
        $SP->GhiChu = "";
        $SP->NguoiTao = "Hồ Thanh Phúc";
        $SP->save();

        $SP1 = new SanPham();
        $SP1->MaSanPham = "SP00000002";
        $SP1->TenSanPham = "Versace Eros Flame";
        $SP1->ThuongHieu ="Versaces" ;
        $SP1->TrangThai ="1" ;
        $SP1->GiaTien = 2190000;
        $SP1->MoTa = "Hương đầu: Chinotto, Quả chanh vàng, Quả quýt hồng, Tiêu đen, Cây hương thảo
        Hương giữa: Hoa hồng, Hoa phong lữ, Tiêu
        Hương cuối: Gỗ tuyết tùng Texas, Cây hoắc hương, Đậu Tonka, Hương Vani, Gỗ đàn hương
        Versace Eros Flame được ra mắt vào năm 2018, được miêu tả như một dòng cảm xúc chứa đầy nội tâm cùng những sắc thái biểu cảm xung đột, mâu thuẫn đầy tâm trạng của những người đàn ông với vẻ bề ngoài mạnh mẽ, tự tin và thành đạt.
        Vẫn giữ lại sự cuốn hút và nam tính của người anh Eros, nhưng sự phá cách trong cách tạo mùi hương của hãng Versace đã tạo ra một Eros Flame đầy cá tính với các tone mùi mang hương vị cam quýt và gỗ đàn hương, vani và tiêu đen, Hoa phong lữ và đậu tonka ,
        được mô tả là 'lạnh và nóng, ngọt và cay, ánh sáng và bóng tối'. Khái niệm này được tạo ra dựa trên một câu chuyện đầy cảm hứng về tình yêu nồng nàn, với nhân vật chính là mùi hương của một người đàn ông mạnh mẽ, đam mê, tự tin, người có những tiếp xúc sâu sắc với cảm xúc của chính mình.
        Olivier Pescheux là chuyên gia nước hoa đã tạo ra Versace Eros Flame, với mong muốn tạo ra một chàng chai Eros mới, bùng nổ hơn, có chiều sâu hơn, và đặc biệt trong trong trái tim của Eros, luôn có một ngọn lửa đam mê không bao giờ ngừng tắt, bùng cháy như Versace Eros Flame.";
        $SP1->HinhAnh = "";
        $SP1->LoaiKichCo = "KC01";
        $SP1->LoaiSanPham = "LSP01";
        $SP1->GhiChu = "";
        $SP1->NguoiTao = "Hồ Thanh Phúc";
        $SP1->save();

        $SP2 = new SanPham();
        $SP2->MaSanPham = "SP00000003";
        $SP2->TenSanPham = "Dior Sauvage Eau de Toilette";
        $SP2->ThuongHieu ="Christian Dior" ;
        $SP2->TrangThai ="1" ;
        $SP2->GiaTien = 3200000;
        $SP2->MoTa = "Hương đầu: Cam Bergamot, Tiêu
        Hương giữa: Tiêu Sichuan, Hoa Oải Hương, Tiêu Hồng, Cỏ Hương Bài, Hoắc Hương, Phong Lữ, Nhựa Elemi
        Hương cuối: Ambroxan, Tuyết Tùng, Labannum
        Ra mắt từ năm 2015, với tuổi đời của chỉ vỏn vẹn 7 năm nhưng điều đó cũng không thể cản trở Dior Sauvage trở thành một trong những chai nước hoa kinh điển nhất của nhà mốt Christian Dior nói riêng và của thị trường nước hoa thế giới nói chung. Mặc cho rất nhiều ý kiến trái chiều về Dior Sauvage, không ai có thể phủ nhận rằng đây là một mùi hương rất nam tính và quyến rũ.
        Những đặc điểm nổi bật về mùi hương của Dior Sauvage là một mùi hương Xanh, nam tính và nịnh mũi với các nốt hương chủ đạo của Cam Chanh, hòa quyện với vị cay cay, mạnh mẽ của Tiêu và kết lại với nốt hương Ambroxan - nguyên liệu lấy cảm hứng từ món quà của đại dương, Long Diên Hương. Luôn đứng đầu danh sách những chai nước hoa được săn đón, phổ biến nhất, nhưng mùi hương của Dior Sauvage vẫn luôn giữ vững được phong độ, không hề mờ nhạt trước muôn vàn ấn phẩm mùi hương khác.
        Không chỉ xứng đáng sở hữu vì mùi hương mà độ bám tỏa của Dior Sauvage chắc chắn cũng sẽ làm bạn hài lòng. Đảm bảo Dior Sauvage sẽ mang lại cho bạn một trải nghiệm, hình ảnh của một người đàn ông nam tính, lịch lãm và có đôi phần hoang dã, phong trần như Johnny Depp trong chiến dịch quảng cáo cho mùi hương này.";
        $SP2->HinhAnh = "";
        $SP2->LoaiKichCo = "KC01";
        $SP2->LoaiSanPham = "LSP01";
        $SP2->GhiChu = "";
        $SP2->NguoiTao = "Hồ Thanh Phúc";
        $SP2->save();

        $SP3 = new SanPham();
        $SP3->MaSanPham = "SP00000004";
        $SP3->TenSanPham = "Dolce & Gabbana The One Eau de Parfum for Men";
        $SP3->ThuongHieu ="Dolce & Gabbana" ;
        $SP3->TrangThai ="1" ;
        $SP3->GiaTien = 2660000;
        $SP3->MoTa = "Hương đầu: Bưởi, Húng quế, Rau mùi
        Hương giữa: Gừng, Bạch đậu khấu, Hoa cam
        Hương cuối: Thuốc lá, Hổ phách, Gỗ tuyết tùng
        Hai mươi bảy là ngưỡng tuổi mà tôi không còn dễ dàng bị hấp dẫn bởi những chàng trai có hình thể lực lưỡng hay các bạn trẻ năng nổ cá tính. Điều tôi cần là một người đàn ông trưởng thành, chín chắn, tự tin và bản lĩnh. Và tất thảy những điểm đó sẽ được thể hiện qua tính cách, lời nói và đôi khi chỉ là mùi hương nước hoa mà anh ấy dùng hằng ngày.
        Dolce & Gabbana The One EDP tiếp cận tôi bằng hương Bưởi, Húng quế và Rau mùi khiến khứu giác tôi như bừng tỉnh vì ấn tượng đầu tiên quá mãnh liệt. Tôi bị ấn tượng bởi chính sự hấp dẫn ấy với loạt cảm xúc như đang dần dâng trào từ Gừng, Bạch đậu khấu và Hoa cam kết hợp với nhau một cách đầy tinh tế và sâu lắng. Nhưng đó chưa phải là tất cả, thứ mùi hương như muốn nuốt chửng, khóa tôi lại cùng với những xúc cảm này đó chính là dư vị đàn ông của Thuốc lá, Hổ phách. Từ đó tôi quyết định cho cả hai cơ hội để có nhiều thời gian tìm hiểu về nhau hơn.
        Có thể nói Dolce & Gabbana The One EDP là một biểu tượng cho hình ảnh người đàn ông mà tôi muốn. Anh ta có cả sự trải đời, kinh nghiệm và hơn hết là rất đậm mùi đàn ông trưởng thành.";
        $SP3->HinhAnh = "";
        $SP3->LoaiKichCo = "KC01";
        $SP3->LoaiSanPham = "LSP01";
        $SP3->GhiChu = "";
        $SP3->NguoiTao = "Hồ Thanh Phúc";
        $SP3->save();

        $SP4 = new SanPham();
        $SP4->MaSanPham = "SP00000005";
        $SP4->TenSanPham = "Chanel Bleu De Chanel Eau de Parfum";
        $SP4->ThuongHieu ="Chanel" ;
        $SP4->TrangThai ="1" ;
        $SP4->GiaTien =3450000;
        $SP4->MoTa = "Hương đầu: Quả bưởi, Quả chanh vàng, Bạc hà, Tiêu hồng, Cam Bergamot, Aldehydes, Hạt rau mùi.
        Hương giữa: Gừng, Nhục đậu khấu, Hoa nhài, Quả dưa.
        Hương cuối: Nhang, Nhựa hổ phách, Gỗ tuyết tùng, Gỗ đàn hương, Hoắc hương, Nhựa Labdanum, Nhựa Hổ phách.
        Sự ra mắt của Bleu de Chanel năm 2010 giống như một người khởi xướng cho phong trào làm nước hoa “blue” tới từ các nhà hương, một phong cách mùi hương nịnh mũi, dễ gần và vô cùng đa dụng. Bleu de Chanel dường như đáp ứng đầy đủ các yêu cầu dành cho cánh mày râu khi cần tìm kiếm một mùi hương gây được dấu ấn của bản thân mình thời điểm đó. Với sự chu toàn của Chanel, việc cho ra một phiên bản nâng cấp để hoàn thiện tính hoàn hảo cho mùi hương là điều chắc chắn xảy ra, và chúng ta đã có Bleu de Chanel Eau de Parfum vào năm 2014.
        Vốn được rất nhiều người trong cộng đồng nước hoa đánh giá là phiên bản hoàn hảo nhất của dòng Bleu de Chanel, Bleu de Chanel Eau de Parfum vẫn đem tới cho các quý ông một khởi đầu tươi sáng và thanh lịch. Bưởi và Gừng, thứ được cho là dấu ấn của dòng hương nổi tiếng của Chanel, được tô đậm và làm sáng lên rõ ràng trong Bleu de Chanel Eau de Parfum, đa sắc và dày dặn hơn. Đi vào tâm của mùi hương cũng vậy, khi phiên bản Bleu de Chanel Eau de Parfum sở hữu một mùi hương có chiều sâu rõ rệt với sự xuất hiện của Nhựa hổ phách, bên cạnh hương Gỗ và Nhang đã tạo nên nhận diện đặc trưng ở tầng hương cuối cho dòng hương Bleu de Chanel.
        Vốn được sinh ra để thỏa mãn tất cả những người yêu thích phong cách hương thơm “kiểu Bleu de Chanel”, phiên bản Eau de Parfum này thực sự là một mảnh ghép hoàn hảo được Chanel đem tới để làm mãn nguyện những quý ông yêu thích dòng hương này.";
        $SP4->HinhAnh = "";
        $SP4->LoaiKichCo = "KC01";
        $SP4->LoaiSanPham = "LSP01";
        $SP4->GhiChu = "";
        $SP4->NguoiTao = "Hồ Thanh Phúc";
        $SP4->save();

        $SP5 = new SanPham();
        $SP5->MaSanPham = "SP00000006";
        $SP5->TenSanPham = "Giorgio Armani Acqua Di Gio Pour Homme";
        $SP5->ThuongHieu ="Giorgio Armani" ;
        $SP5->TrangThai ="1" ;
        $SP5->GiaTien = 2350000;
        $SP5->MoTa = "Hương đầu: Quả chanh xanh, Quả chanh vàng, Cam Bergamot, Hoa nhài, Quả cam, Quả quýt, Neroli.
        Hương giữa: Hương biển, Hương nước, Hoa nhài, Quả đào, Hoa lan Nam Phi, Hoa lan dạ hương, Hương thảo, Hoa anh thảo, Hoa Violet, Thì là, Nhục đậu khấu, Hoa hồng, Cây mộc tê.
        Hương cuối: Xạ hương trắng, Gỗ tuyết tùng, Rêu sồi, Hoắc hương, Amber.

        Nếu phải kể tên một chai nước hoa nam kinh điển nhất mọi thời đại thì chắc chắn cái tên Acqua Di Gio sẽ nằm trong danh sách ấy. Vào năm 1996, thương hiệu Giorgio Armani đã tạo được tiếng vang toàn cầu với mùi hương siêu phẩm này.

        Để bàn về mùi hương của Acqua di Giò, ta không cần đến nhiều lời bàn luận nữa, chỉ cần nhìn cách Giò trắng sống mãi với thời gian, hay những ngày nắng vàng rụm bỗng thấy chúng thoang thoảng lướt qua mũi ta từ một người đồng nghiệp ghé ngang văn phòng. Một mùi hương cam chanh dễ chịu, hòa với hương nước sảng khoái cùng hương hoa nhẹ nhàng, quyện lẫn với nhau, nhuần nhuyễn và thuần thục qua bàn tay của nhà điều hương lừng danh Alberto Morillas.

        Dù đã hơn 26 năm kể từ ngày ra mắt, thế nhưng sức lan tỏa của Acqua di Giò vẫn là một thứ hiện diện rõ ràng, trong văn phòng, trên phố, quán café, hay tủ đựng nước hoa của bất kỳ người yêu hương nào";
        $SP5->HinhAnh = "";
        $SP5->LoaiKichCo = "KC01";
        $SP5->LoaiSanPham = "LSP01";
        $SP5->GhiChu = "";
        $SP5->NguoiTao = "Hồ Thanh Phúc";
        $SP5->save();

        $SP6 = new SanPham();
        $SP6->MaSanPham = "SP00000007";
        $SP6->TenSanPham = "Gucci Bloom Eau de Parfum For Her";
        $SP6->ThuongHieu ="Gucci" ;
        $SP6->TrangThai ="1" ;
        $SP6->GiaTien = 3200000;
        $SP6->MoTa = "Hương đầu: Hoa nhài
        Hương giữa: Hoa huệ
        Hương cuối: Hoa sử quân tử

        Gucci Bloom EDP For Her, một mùi hương tiêu biểu cho một nét đẹp thanh thoát và tao nhã chuẩn Ý. Nếu bạn lỡ say đắm mùi hương thanh lịch và quyến rũ của những đoá hoa trắng, thì nhất định bạn sẽ phải 'nghiêng mình ngả mũ' khi bắt gặp mùi hương của Gucci Bloom EDP trên phố.

        Chưng cất hương thơm của một vườn hoa nào Nhài và Huệ vào buổi sớm, Gucci Bloom EDP toả hương thơm nức lòng người, kiều diễm và tràn đầy sức sống. Ấy thế, đâu đó len lỏi trong từng tầng hương vẫn là chút vị đắng nhưng tươi, bạn có thể lấy mùi hương của Trà để tưởng tượng.

        Từng phút từng giây trôi qua, ta chỉ ngày càng thêm yêu nét hương ý tứ, sang trọng mà Gucci Bloom EDP chưng cất. Nhiều người hỏi rằng Gucci Bloom EDP phù hợp với độ tuổi nào, mà quả thật thì tôi không biết chắc, vì với tôi, đây là một mùi hương không có tuổi và đẹp đẽ vô vàn.";
        $SP6->HinhAnh = "";
        $SP6->LoaiKichCo = "KC01";
        $SP6->LoaiSanPham = "LSP02";
        $SP6->GhiChu = "";
        $SP6->NguoiTao = "Hồ Thanh Phúc";
        $SP6->save();

        $SP7 = new SanPham();
        $SP7->MaSanPham = "SP00000008";
        $SP7->TenSanPham = "Jean Paul Gaultier Scandal";
        $SP7->ThuongHieu ="Jean Paul Gaultier" ;
        $SP7->TrangThai ="1" ;
        $SP7->GiaTien = 3200000;
        $SP7->MoTa = "Hương đầu: Cam Đỏ, Quýt
        Hương giữa: Mật Ong, Hoa Nhài, Hoa Cam, Đào, Hoa Sơn Chi.
        Hương cuối: Sáp Ong, Caramel, Hoắc Hương, Cam Thảo.

        Scandal tiếp nối xu hướng mùi hương tông Ngọt nhưng với một điểm nhấn mới lạ và sẽ làm phong phú thêm bộ sưu tập nước hoa của Jean Paul Gaultier vào mùa xuân. Và từ đây mang đến một ngôi sao mới của thương hiệu Jean Paul Gaultier, được đặt tên là SCANDAL.

        Scandal được tạo nên với một sứ mệnh. để phá bỏ mọi rập khuôn, mang đến một cái gì đó mới mẻ và hiện đại, đồng thời mạnh mẽ và thanh lịch. Các nốt hương chính của thành phần là Cam Đỏ, Mật Ong, Hoắc Hương và Hoa Nhài. Một đặc điểm dễ nhận biết về mùi hương của Scandal rằng đây là một mùi hương ngọt ngào và béo ngậy nhờ vào nốt hương Mật Ong và Caramel. Ngọt nhưng không hề khó chịu hay nồng gắt bởi vì ở Scandal còn có những tông mùi nhẹ nhàng, nữ tính và thanh tao của hoa Nhài, hoa Sơn Chi cùng với vị ngọt ngào của những quả Cam và Đào tràn đầy năng lượng.

        Thương hiệu tuyên bố rằng họ muốn sáng tạo nên một phiên bản khác của những dòng nước hoa trước đó từ bộ sưu tập Jean Paul Gaultier mà vẫn tôn trọng DNA nổi tiếng của thương hiệu với mục tiêu là tạo ra thứ gì đó chất chơi hơn, gợi cảm và vui nhộn hơn, từ chai nước hoa đến chiến dịch quảng cáo.";
        $SP7->HinhAnh = "";
        $SP7->LoaiKichCo = "KC01";
        $SP7->LoaiSanPham = "LSP02";
        $SP7->GhiChu = "";
        $SP7->NguoiTao = "Hồ Thanh Phúc";
        $SP7->save();

        $SP8 = new SanPham();
        $SP8->MaSanPham = "SP00000009";
        $SP8->TenSanPham = "Carolina Herrera Good Girl Eau de Parfum";
        $SP8->ThuongHieu ="Carolina Herrera" ;
        $SP8->TrangThai ="1" ;
        $SP8->GiaTien = 3200000;
        $SP8->MoTa = "Hương đầu: Hạnh nhân, Cà phê, Cam Bergamot, Quả chanh vàng.
        Hương giữa: Hoa huệ, Hoa nhài Sambac, Hoa cam, Rễ Diên vĩ, Hoa hồng Bulgaria.
        Hương cuối: Đậu Tonka, Cacao, Vanilla, Kẹo Praline, Gỗ đàn hương, Xạ hương, Nhựa Hổ phách, Gỗ Cashmere, Quế, Hoắc hương, Tuyết tùng.

        Năm 2016, nhà mốt Carolina Herrera hợp tác với nghệ sĩ điều hương Louise Turner để cho ra mắt “chiếc guốc” lộng lẫy mang tên Good Girl, mở ra dòng hương mới rất được các chị em ưa chuộng. Một chai nước hoa gây chú ý với tất cả sự điệu đà dành cho phái đẹp, khoác lên ngoại hình một chiếc guốc cao gót sang trọng đầy nữ tính sẽ mang tới mùi hương như thế nào?

        Với thông điệp “good to be bad”, Good Girl dường như là phát ngôn mà Carolina Herrera muốn gửi tới các chị em, rằng hãy là chính mình, bộc lộ những cá tính đặc biệt của bản thân là một cách tốt đẹp để trở nên tuyệt vời hơn. Good Girl Eau de Parfum đem tới một mùi hương gây sự chú ý ngay từ những làn hương đầu tiên, với Hạnh nhân và Cà phê, thơm ngậy và hơi khô, nhưng đảm bảo một sự ngọt ngào dành cho các quý cô ngay từ giai đoạn mở đầu. Hỗn hợp Hoa trắng kéo theo sau, Huệ, Nhài, cùng nhau bung tỏa hương thơm trong khứu giác, phủ lên chút hiền dịu ôn hòa của Hoa cam.

        Đậu Tonka, Vanilla hay kẹo Praline, những hương thơm ngon lành và ngọt ngào chực chờ lan tỏa, biến Good Girl trở thành một trong những mùi hương dành cho phái đẹp mang sắc màu ngọt ngào và gây sự chú ý nhất trên thị trường. Good Girl được yêu thích bởi phái đẹp, dường như qua cách mà mùi hương này thể hiện nét ngọt ngào nữ tính rất nịnh mũi các chị em.";
        $SP8->HinhAnh = "";
        $SP8->LoaiKichCo = "KC01";
        $SP8->LoaiSanPham = "LSP02";
        $SP8->GhiChu = "";
        $SP8->NguoiTao = "Hồ Thanh Phúc";
        $SP8->save();

        $SP9 = new SanPham();
        $SP9->MaSanPham = "SP00000010";
        $SP9->TenSanPham = "Narciso Eau de Parfum Cristal";
        $SP9->ThuongHieu ="Narciso" ;
        $SP9->TrangThai ="1" ;
        $SP9->GiaTien = 2650000;
        $SP9->MoTa = "Hương đầu: Hoa lan Nam Phi, Hoa cam, Cam bergamot
        Hương giữa: Xạ hương, Hoa trắng, Hoa hồng, Hoa nhài
        Hương cuối: Len cashmere, Gỗ tuyết tùng, Hổ phách, Benzoin

        Narciso Eau de Parfum Cristal từ giây phút đầu tiên tiếp xúc đã gây ấn tượng với người dùng về sự phức tạp trong mùi hương. Lớp hương này chồng lên lớp hương kia, loài hoa này đan xen với loài hoa kia. Cảm giác bối rối là dễ hiểu, và sự băn khoăn không biết phải miêu tả hương thơm này như thế này, cũng là dễ hiểu nốt. Để ví von cho nhanh thì chỉ có thể nói Cristal là một khu vườn um tùm hoa lá, thoạt nhiên không thể đếm hết các màu sắc hiện hữu trong không gian, nhưng chính vì thế mà chúng trở nên thật đặc biệt và đẹp đẽ.

        Tôi cũng không muốn bóc tách từng hương hoa một, ngộ nhỡ làm mất đi vẻ đặc sắc vốn có của Cristal. Mà tôi chỉ biết nói rằng âm hưởng của các nét hương Hoa có trầm có bổng, có thanh có đậm. Những khi hương thơm có phần sắc lại, đanh và nồng nàn, bạn có thể nói rằng khi ấy có sự xuất hiện của Hoa nhài, hoa lan Nam Phi và Hoa cam. Và khi hương thơm mềm mại lại và miên man hơn, khi ấy hẳn Hoa hồng và Xạ hương đã tự mình kết hợp và ngát hương.

        Khu vườn mà Cristal tạo nên cũng không thiếu những khía cạnh khô hăng của Gỗ tuyết tùng, và cũng không thiếu nét hương man mát, the cay của Cam bergamot. Cứ như vậy, tất cả những nét vị ấy trộn lẫn vào nhau, ăn nhập và hoà quyện ăn ý.";
        $SP9->HinhAnh = "";
        $SP9->LoaiKichCo = "KC01";
        $SP9->LoaiSanPham = "LSP02";
        $SP9->GhiChu = "";
        $SP9->NguoiTao = "Hồ Thanh Phúc";
        $SP9->save();

        $SP10 = new SanPham();
        $SP10->MaSanPham = "SP0000011";
        $SP10->TenSanPham = "Narciso Eau de Parfum Cristal";
        $SP10->ThuongHieu ="Narciso" ;
        $SP10->TrangThai ="1" ;
        $SP10->GiaTien ="265000" ;
        $SP10->MoTa = "Hương đầu: Hoa lan Nam Phi, Hoa cam, Cam bergamot
        Hương giữa: Xạ hương, Hoa trắng, Hoa hồng, Hoa nhài
        Hương cuối: Len cashmere, Gỗ tuyết tùng, Hổ phách, Benzoin

        Narciso Eau de Parfum Cristal từ giây phút đầu tiên tiếp xúc đã gây ấn tượng với người dùng về sự phức tạp trong mùi hương. Lớp hương này chồng lên lớp hương kia, loài hoa này đan xen với loài hoa kia. Cảm giác bối rối là dễ hiểu, và sự băn khoăn không biết phải miêu tả hương thơm này như thế này, cũng là dễ hiểu nốt. Để ví von cho nhanh thì chỉ có thể nói Cristal là một khu vườn um tùm hoa lá, thoạt nhiên không thể đếm hết các màu sắc hiện hữu trong không gian, nhưng chính vì thế mà chúng trở nên thật đặc biệt và đẹp đẽ.

        Tôi cũng không muốn bóc tách từng hương hoa một, ngộ nhỡ làm mất đi vẻ đặc sắc vốn có của Cristal. Mà tôi chỉ biết nói rằng âm hưởng của các nét hương Hoa có trầm có bổng, có thanh có đậm. Những khi hương thơm có phần sắc lại, đanh và nồng nàn, bạn có thể nói rằng khi ấy có sự xuất hiện của Hoa nhài, hoa lan Nam Phi và Hoa cam. Và khi hương thơm mềm mại lại và miên man hơn, khi ấy hẳn Hoa hồng và Xạ hương đã tự mình kết hợp và ngát hương.

        Khu vườn mà Cristal tạo nên cũng không thiếu những khía cạnh khô hăng của Gỗ tuyết tùng, và cũng không thiếu nét hương man mát, the cay của Cam bergamot. Cứ như vậy, tất cả những nét vị ấy trộn lẫn vào nhau, ăn nhập và hoà quyện ăn ý.";
        $SP10->HinhAnh = "";
        $SP10->LoaiKichCo = "KC10";
        $SP10->LoaiSanPham = "LSP02";
        $SP10->GhiChu = "";
        $SP10->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP10->save();


        $SP11 = new SanPham();
        $SP11->MaSanPham = "SP0000012";
        $SP11->TenSanPham = "Jean Paul Gaultier Scandal";
        $SP11->ThuongHieu ="Jean Paul Gaultier" ;
        $SP11->TrangThai ="1" ;
        $SP11->GiaTien ="320000" ;
        $SP11->MoTa = "Hương đầu: Cam Đỏ, Quýt
        Hương giữa: Mật Ong, Hoa Nhài, Hoa Cam, Đào, Hoa Sơn Chi.
        Hương cuối: Sáp Ong, Caramel, Hoắc Hương, Cam Thảo.

        Scandal tiếp nối xu hướng mùi hương tông Ngọt nhưng với một điểm nhấn mới lạ và sẽ làm phong phú thêm bộ sưu tập nước hoa của Jean Paul Gaultier vào mùa xuân. Và từ đây mang đến một ngôi sao mới của thương hiệu Jean Paul Gaultier, được đặt tên là SCANDAL.

        Scandal được tạo nên với một sứ mệnh. để phá bỏ mọi rập khuôn, mang đến một cái gì đó mới mẻ và hiện đại, đồng thời mạnh mẽ và thanh lịch. Các nốt hương chính của thành phần là Cam Đỏ, Mật Ong, Hoắc Hương và Hoa Nhài. Một đặc điểm dễ nhận biết về mùi hương của Scandal rằng đây là một mùi hương ngọt ngào và béo ngậy nhờ vào nốt hương Mật Ong và Caramel. Ngọt nhưng không hề khó chịu hay nồng gắt bởi vì ở Scandal còn có những tông mùi nhẹ nhàng, nữ tính và thanh tao của hoa Nhài, hoa Sơn Chi cùng với vị ngọt ngào của những quả Cam và Đào tràn đầy năng lượng.

        Thương hiệu tuyên bố rằng họ muốn sáng tạo nên một phiên bản khác của những dòng nước hoa trước đó từ bộ sưu tập Jean Paul Gaultier mà vẫn tôn trọng DNA nổi tiếng của thương hiệu với mục tiêu là tạo ra thứ gì đó chất chơi hơn, gợi cảm và vui nhộn hơn, từ chai nước hoa đến chiến dịch quảng cáo.";
        $SP11->HinhAnh = "";
        $SP11->LoaiKichCo = "KC10";
        $SP11->LoaiSanPham = "LSP02";
        $SP11->GhiChu = "";
        $SP11->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP11->save();

        $SP12 = new SanPham();
        $SP12->MaSanPham = "SP00000013";
        $SP12->TenSanPham = "Versace Eros Flame";
        $SP12->ThuongHieu ="Versaces" ;
        $SP12->TrangThai ="1" ;
        $SP12->GiaTien ="1790000" ;
        $SP12->MoTa = "Hương đầu: Chinotto, Quả chanh vàng, Quả quýt hồng, Tiêu đen, Cây hương thảo
        Hương giữa: Hoa hồng, Hoa phong lữ, Tiêu
        Hương cuối: Gỗ tuyết tùng Texas, Cây hoắc hương, Đậu Tonka, Hương Vani, Gỗ đàn hương
        Versace Eros Flame được ra mắt vào năm 2018, được miêu tả như một dòng cảm xúc chứa đầy nội tâm cùng những sắc thái biểu cảm xung đột, mâu thuẫn đầy tâm trạng của những người đàn ông với vẻ bề ngoài mạnh mẽ, tự tin và thành đạt.
        Vẫn giữ lại sự cuốn hút và nam tính của người anh Eros, nhưng sự phá cách trong cách tạo mùi hương của hãng Versace đã tạo ra một Eros Flame đầy cá tính với các tone mùi mang hương vị cam quýt và gỗ đàn hương, vani và tiêu đen, Hoa phong lữ và đậu tonka ,
        được mô tả là 'lạnh và nóng, ngọt và cay, ánh sáng và bóng tối'. Khái niệm này được tạo ra dựa trên một câu chuyện đầy cảm hứng về tình yêu nồng nàn, với nhân vật chính là mùi hương của một người đàn ông mạnh mẽ, đam mê, tự tin, người có những tiếp xúc sâu sắc với cảm xúc của chính mình.
        Olivier Pescheux là chuyên gia nước hoa đã tạo ra Versace Eros Flame, với mong muốn tạo ra một chàng chai Eros mới, bùng nổ hơn, có chiều sâu hơn, và đặc biệt trong trong trái tim của Eros, luôn có một ngọn lửa đam mê không bao giờ ngừng tắt, bùng cháy như Versace Eros Flame.";
        $SP12->HinhAnh = "";
        $SP12->LoaiKichCo = "KC01";
        $SP12->LoaiSanPham = "LSP01";
        $SP12->GhiChu = "";
        $SP12->NguoiTao = "Hồ Thanh Phúc";
        $SP12->save();


        $SP13 = new SanPham();
        $SP13->MaSanPham = "SP00000014";
        $SP13->TenSanPham = "Moschino Toy Boy";
        $SP13->ThuongHieu ="Moschino" ;
        $SP13->TrangThai ="1" ;
        $SP13->GiaTien ="1390000" ;
        $SP13->MoTa = "Hương đầu: Cam bergamot, Hồng tiêu, Trái lê
        Hương giữa: Hoa hồng, Hoa mộc lan
        Hương cuối: Cỏ Vetiver, Gỗ Cashmeran

        Toy Boy là dòng nước hoa nam của thương hiệu Moschino mới được ra mắt vào năm 2019 và được thiết kế bởi giám đốc sáng tạo Jeremy Scott. Toy Boy diễn giải về một người đàn ông tự tin, năng động, đầy hoài bão và đam mê, nhưng không ngại thể hiện khía cạnh hóm hỉnh và hài hước của bản thân. Được chuyên gia nước hoa hàng đầu Yann Vasnier sáng tạo ra, Moschino Toy Boy thể hiện được đầy đủ sự tinh quái của ông cách tạo hương của ông, khi hương đầu là sự kết hợp mới lạ giữa sự tươi mát của Cam bergamot, trái lê và vị ấm nồng của hồng tiêu. Và mặc dù là nước hoa nam, trái tim của Toy Boy lại phủ đầy các note hương hoa đầy quyến rũ. Toy Boy thể hiện được sự trầm ngâm và nam tính nhất khi yên vị trên da ở tầng hương cuối, nơi có sự giao thoa mạnh mẽ giữa cỏ Vetiver và hương gỗ Cashmeran. Được đánh giá là một chai nước hoa khó phán đoán và xác định được các tầng hương cụ thể, Toy Boy còn gây ấn tượng mạnh với thiết kế đậm chất lạ của Moschino. ";
        $SP13->HinhAnh = "";
        $SP13->LoaiKichCo = "KC01";
        $SP13->LoaiSanPham = "LSP01";
        $SP13->GhiChu = "";
        $SP13->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP13->save();

        $SP14 = new SanPham();
        $SP14->MaSanPham = "SP00000015";
        $SP14->TenSanPham = "Mr. Mr. Burberry Eau de Parfum Eau de Parfum";
        $SP14->ThuongHieu ="Burberry" ;
        $SP14->TrangThai ="1" ;
        $SP14->GiaTien ="2800000" ;
        $SP14->MoTa = "Hương đầu: Bạch đậu khấu, Bạc hà, Lá ngải giấm.
        Hương giữa: Hoa oải hương, Nhục đậu khấu, Gỗ tuyết tùng.
        Hương cuối: Hoắc hương, Quế, Nhựa hổ phách, Nhựa hương Benzoin, Cỏ hương bài, Gỗ đàn hương.

        Là một hãng được cấp Chứng chỉ Hoàng gia, Burberry có một bề dày lịch sử phát triển đáng trân trọng, chứng minh được trình độ và tên tuổi, và họ cũng là một phần tự hào của Vương quốc Anh. Với nước hoa, Burberry vẫn giữ được những nét đặc trưng lịch lãm của hãng về cả ngoại hình và mùi hương, và Mr. Burberry Eau de Parfum (Mr. Burberry EDP) cũng vậy, một mùi hương kiểu Gỗ - Thảo mộc - Gia vị, truyền thống và thân thuộc, mang đậm âm hưởng của một quý ông Anh quốc.

        Mr. Burberry EDP đem tới một mùi hương với phong cách cổ điển, và Burberry tự công nhận rằng nó không phải là một thứ hương mới lạ. Chỉ là Gỗ, Gia vị và Thảo mộc quen thuộc, nhưng được biến hóa để trở nên hiện đại và tươi mới hơn bằng những nguyên liệu được tuyển chọn kỹ lưỡng cùng bàn tay sáng tạo của bậc thầy Francis Kurkdjian. Mr. Burberry khởi đầu bằng một hỗn hợp hương Thảo mộc được hòa trộn mượt mà của Bạc hà và Ngải giấm, xen lẫn với hương Gia vị ấm áp của Quế, Bạch đậu khấu và Nhục đậu khấu. Chuyển đến tâm của mùi hương, Gỗ tuyết tùng tươi và sạch xuất hiện, làm nền cho hương Oải hương chững chạc nhưng gợi cảm, mang tới cho Mr. Burberry EDP một nét nam tính kiểu mùi hương Gỗ - Dương xỉ quen thuộc nhưng hiện đại, tươi mới và năng động. Khi mùi hương trôi dần về cuối, Mr. Burberry EDP dần dà chuyển hoàn toàn thành một quý ông trưởng thành và ấm áp, có chiều sâu hơn bằng Hoắc hương và Nhựa hương, cùng một chút ngọt ngậy dậy mùi của Gỗ đàn hương.

        Mang đậm dấu ấn cổ điển nhưng không cũ kỹ, Mr. Burberry EDP đại diện cho những quý ông trang trọng lịch lãm thời hiện đại, vừa nam tính kiểu cách phức tạp, nhưng không kém phần thanh thoát và tươi trẻ. ";
        $SP14->HinhAnh = "";
        $SP14->LoaiKichCo = "KC01";
        $SP14->LoaiSanPham = "LSP01";
        $SP14->GhiChu = "";
        $SP14->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP14->save();


        $SP15 = new SanPham();
        $SP15->MaSanPham = "SP00000016";
        $SP15->TenSanPham = "Mr. Mr. Burberry Eau de Parfum Eau de Parfum";
        $SP15->ThuongHieu ="Burberry" ;
        $SP15->TrangThai ="1" ;
        $SP15->GiaTien ="1800000" ;
        $SP15->MoTa = "Hương đầu: Bạch đậu khấu, Bạc hà, Lá ngải giấm.
        Hương giữa: Hoa oải hương, Nhục đậu khấu, Gỗ tuyết tùng.
        Hương cuối: Hoắc hương, Quế, Nhựa hổ phách, Nhựa hương Benzoin, Cỏ hương bài, Gỗ đàn hương.

        Là một hãng được cấp Chứng chỉ Hoàng gia, Burberry có một bề dày lịch sử phát triển đáng trân trọng, chứng minh được trình độ và tên tuổi, và họ cũng là một phần tự hào của Vương quốc Anh. Với nước hoa, Burberry vẫn giữ được những nét đặc trưng lịch lãm của hãng về cả ngoại hình và mùi hương, và Mr. Burberry Eau de Parfum (Mr. Burberry EDP) cũng vậy, một mùi hương kiểu Gỗ - Thảo mộc - Gia vị, truyền thống và thân thuộc, mang đậm âm hưởng của một quý ông Anh quốc.

        Mr. Burberry EDP đem tới một mùi hương với phong cách cổ điển, và Burberry tự công nhận rằng nó không phải là một thứ hương mới lạ. Chỉ là Gỗ, Gia vị và Thảo mộc quen thuộc, nhưng được biến hóa để trở nên hiện đại và tươi mới hơn bằng những nguyên liệu được tuyển chọn kỹ lưỡng cùng bàn tay sáng tạo của bậc thầy Francis Kurkdjian. Mr. Burberry khởi đầu bằng một hỗn hợp hương Thảo mộc được hòa trộn mượt mà của Bạc hà và Ngải giấm, xen lẫn với hương Gia vị ấm áp của Quế, Bạch đậu khấu và Nhục đậu khấu. Chuyển đến tâm của mùi hương, Gỗ tuyết tùng tươi và sạch xuất hiện, làm nền cho hương Oải hương chững chạc nhưng gợi cảm, mang tới cho Mr. Burberry EDP một nét nam tính kiểu mùi hương Gỗ - Dương xỉ quen thuộc nhưng hiện đại, tươi mới và năng động. Khi mùi hương trôi dần về cuối, Mr. Burberry EDP dần dà chuyển hoàn toàn thành một quý ông trưởng thành và ấm áp, có chiều sâu hơn bằng Hoắc hương và Nhựa hương, cùng một chút ngọt ngậy dậy mùi của Gỗ đàn hương.

        Mang đậm dấu ấn cổ điển nhưng không cũ kỹ, Mr. Burberry EDP đại diện cho những quý ông trang trọng lịch lãm thời hiện đại, vừa nam tính kiểu cách phức tạp, nhưng không kém phần thanh thoát và tươi trẻ. ";
        $SP15->HinhAnh = "";
        $SP15->LoaiKichCo = "KC01";
        $SP15->LoaiSanPham = "LSP01";
        $SP15->GhiChu = "";
        $SP15->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP15->save();

        $SP16 = new SanPham();
        $SP16->MaSanPham = "SP00000017";
        $SP16->TenSanPham = "Giorgio Armani Acqua Di Gio Absolu EDP";
        $SP16->ThuongHieu ="Giorgio Armani" ;
        $SP16->TrangThai ="1" ;
        $SP16->GiaTien ="2500000" ;
        $SP16->MoTa = "Các chai ABSOLU vẫn giữ hình dạng mang tính biểu tượng của Acqua di Giò nhưng thêm màu vàng ươm cho thấy hương thơm màu hổ phách sáng tươi trong một chai thủy tinh trong suốt rõ ràng. Ở phía trên, nắp làm từ gỗ tro có nguồn gốc bền vững tạo ra sự tương phản hoàn toàn cân bằng với phần cổ kim loại sáng bóng.

        Hương đầu: hỗn hợp trái cây tươi, cam bergamot, nước biển

        Hương giữa: phong lữ,oải hương, cây hương thảo

        Hương cuối: hoắc hương, gỗ, nhựa lababnum, đậu tonka";
        $SP16->HinhAnh = "";
        $SP16->LoaiKichCo = "KC01";
        $SP16->LoaiSanPham = "LSP01";
        $SP16->GhiChu = "";
        $SP16->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP16->save();

        $SP17 = new SanPham();
        $SP17->MaSanPham = "SP00000018";
        $SP17->TenSanPham = "Dolce Gabbana Light Blue Pour Homme Forever EDP";
        $SP17->ThuongHieu ="Dolce Gabbana" ;
        $SP17->TrangThai ="1" ;
        $SP17->GiaTien ="2100000" ;
        $SP17->MoTa = "KHÔNG PHẢI BOM XỊT, ĐÂY LÀ PHIÊN BẢN LIGHT BLUE HOÀN HẢO NHẤT!!?

        Sau mùa hè năm 2021, phiên bản mới nhất của D.G cuối cùng cũng được ra mắt dưới tên gọi D.G Light Blue Forever. Được xem như là một phiên bản limited, hoàn thiện hơn so với D.g light Blue 2007.

        Tưởng như đây chỉ là một flanker mùa hè không có gì mới mẻ, nhưng phiên bản này đã đặt một ánh nhìn khác từ những người sành sỏi nước hoa lên bộ sưu tập Light Blue. Light Blue Forever (LBF) sẽ là phiên bản được dự đoán nằm TOP những designer hay nhất được ra mắt trong năm nay với perfume rating 4.31 trên 5 với 593 votes. (theo đánh giá từ phía cộng đồng fragrantica)
        Không riêng gì những mùi Citrus, một mùi hương thường được đánh giá có hay hay không nằm ở độ thật mà người ta cảm nhận được. Và phần opening của LBF thực sự làm không ít người dùng bất ngờ; tất cả những hoài nghi về độ “đạt” của mùi hương này hầu như hoàn toàn tan biến chỉ ngay lần xịt đầu tiên.

        Khác với những tiền bản trong bộ sưu tập D.g Pour Homme, LBF cho ra cảm giác mùi giống như vừa mới bổ ra một quả bưởi. Vỏ và phần thịt từ đó toé ra những tia nước li ti ra không khí mang theo cảm giác ngọt ngào, kèm chút vị the, đăng đắng dễ chịu. Nếu tinh ý, ta sẽ cảm nhận được chút cay nhẹ man mát,.

        Đúng như cái tên “light blue”. Đó là một khoảng hương mang đầy năng lượng, sảng khoái và sự bừng sáng sau lớp hương của Cam bưởi. Mùi thơm mát mẻ, airy của biển theo đánh giá là rất thật, không quá tanh, không quá hoá học bù lại là cái vibe sạch sẽ, nam tính. Sau cùng, LBF để lại trên làn da chút hương hoa, xạ hương trắng và gỗ (tại đây là Java Vetiver, khác với Haiti Vetiver nó sẽ đặc quánh hơn, ấm và có vị khói; trên thực tế, nốt hương này như chấm phá thêm nét độc đáo cho toàn thể mùi hương LBF).";
        $SP17->HinhAnh = "";
        $SP17->LoaiKichCo = "KC01";
        $SP17->LoaiSanPham = "LSP01";
        $SP17->GhiChu = "";
        $SP17->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP17->save();

        $SP18 = new SanPham();
        $SP18->MaSanPham = "SP00000019";
        $SP18->TenSanPham = "Chanel Allure Homme Sport EDT";
        $SP18->ThuongHieu ="Chanel" ;
        $SP18->TrangThai ="1" ;
        $SP18->GiaTien ="2300000" ;
        $SP18->MoTa = "Allure Homme Sport được tạo thành bởi Jacques Polge – nhà thiết kế nước hoa đại tài của Chanel. Ông là người đứng sau hàng loạt những mùi hương đình đám của Chanel như Coco Noir, Coco Mademoiselle, Chance Eau Fraiche hay Bleu de Chanel. Chai nước hoa nhỏ mang thiết kế khỏe khoắn và đầy tươi mới với thân chai tráng bạc, logo được in bằng chữ đen chắc khỏe, nắp nhựa đen tuyền được bao quanh bởi một vòng thép cũng góp phần tạo nên sự nam tính mạnh mẽ.";
        $SP18->HinhAnh = "";
        $SP18->LoaiKichCo = "KC01";
        $SP18->LoaiSanPham = "LSP01";
        $SP18->GhiChu = "";
        $SP18->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP18->save();

        $SP19 = new SanPham();
        $SP19->MaSanPham = "SP00000020";
        $SP19->TenSanPham = "Chanel Allure Homme Sport Cologne Men EDT";
        $SP19->ThuongHieu ="Chanel" ;
        $SP19->TrangThai ="1" ;
        $SP19->GiaTien ="2300000" ;
        $SP19->MoTa = "Allure Homme Sport Cologne Men EDT được tạo thành bởi Jacques Polge – nhà thiết kế nước hoa đại tài của Chanel. Ông là người đứng sau hàng loạt những mùi hương đình đám của Chanel như Coco Noir, Coco Mademoiselle, Chance Eau Fraiche hay Bleu de Chanel. Chai nước hoa nhỏ mang thiết kế khỏe khoắn và đầy tươi mới với thân chai tráng bạc, logo được in bằng chữ đen chắc khỏe, nắp nhựa đen tuyền được bao quanh bởi một vòng thép cũng góp phần tạo nên sự nam tính mạnh mẽ.";
        $SP19->HinhAnh = "";
        $SP19->LoaiKichCo = "KC01";
        $SP19->LoaiSanPham = "LSP01";
        $SP19->GhiChu = "";
        $SP19->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP19->save();
    }
}
