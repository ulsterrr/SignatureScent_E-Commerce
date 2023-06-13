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
        $SP->HinhAnh = "versace_eros.jpeg";
        $SP->LoaiKichCo = "KC01";
        $SP->LoaiSanPham = "LSP01";
        $SP->GhiChu = "";
        $SP->NguoiTao = "hothanhphuc2468@gmail.com";
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
        $SP1->HinhAnh = "versace_eros_flame.jpeg";
        $SP1->LoaiKichCo = "KC01";
        $SP1->LoaiSanPham = "LSP01";
        $SP1->GhiChu = "";
        $SP1->NguoiTao = "hothanhphuc2468@gmail.com";
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
        $SP2->HinhAnh = "dior_sauvage.jpeg";
        $SP2->LoaiKichCo = "KC01";
        $SP2->LoaiSanPham = "LSP01";
        $SP2->GhiChu = "";
        $SP2->NguoiTao = "hothanhphuc2468@gmail.com";
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
        $SP3->HinhAnh = "DG_TheOne_EDPe.jpeg";
        $SP3->LoaiKichCo = "KC01";
        $SP3->LoaiSanPham = "LSP01";
        $SP3->GhiChu = "";
        $SP3->NguoiTao = "hothanhphuc2468@gmail.com";
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
        $SP4->HinhAnh = "chanel_bleu_edp.jpeg";
        $SP4->LoaiKichCo = "KC01";
        $SP4->LoaiSanPham = "LSP01";
        $SP4->GhiChu = "";
        $SP4->NguoiTao = "hothanhphuc2468@gmail.com";
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
        $SP5->HinhAnh = "acquadigio.jpg";
        $SP5->LoaiKichCo = "KC01";
        $SP5->LoaiSanPham = "LSP01";
        $SP5->GhiChu = "";
        $SP5->NguoiTao = "hothanhphuc2468@gmail.com";
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
        $SP6->HinhAnh = "gucci_bloom.jpeg";
        $SP6->LoaiKichCo = "KC01";
        $SP6->LoaiSanPham = "LSP02";
        $SP6->GhiChu = "";
        $SP6->NguoiTao = "hothanhphuc2468@gmail.com";
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
        $SP7->HinhAnh = "scandal.jpg";
        $SP7->LoaiKichCo = "KC01";
        $SP7->LoaiSanPham = "LSP02";
        $SP7->GhiChu = "";
        $SP7->NguoiTao = "hothanhphuc2468@gmail.com";
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
        $SP8->HinhAnh = "good_girll.jpg";
        $SP8->LoaiKichCo = "KC01";
        $SP8->LoaiSanPham = "LSP02";
        $SP8->GhiChu = "";
        $SP8->NguoiTao = "hothanhphuc2468@gmail.com";
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
        $SP9->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP9->save();

        $SP10 = new SanPham();
        $SP10->MaSanPham = "SP0000011";
        $SP10->TenSanPham = "Lancome La Vie Est Belle EDP";
        $SP10->ThuongHieu ="Lancome" ;
        $SP10->TrangThai ="1" ;
        $SP10->GiaTien ="2950000" ;
        $SP10->MoTa = "Hương đầu: nho đen Hy Lạp, quả lê
        Hương giữa: hoa Iris, hoa nhài, hoa cam
        Hương cuối: hoắc hương, đậu Tonka, hương vani, kẹo hạnh nhân
        La Vie Est Belle một hương thơm mới vừa ra đời trong mùa thu năm 2012 bởi thương hiệu nổi tiếng Lancôme mang đến sự tự do, hạnh phúc cho phái đẹp. Với khẩu hiệu “Mang đến sự tự tin cho phụ nữ vì họ xứng đáng được như thế”, La Vie Est Belle là một trong 10 sản phẩm bán chạy nhất trên thị trường nước hoa năm 2 năm trở lại đây.";
        $SP10->HinhAnh = "LaVieEst.jpg";
        $SP10->LoaiKichCo = "KC01";
        $SP10->LoaiSanPham = "LSP02";
        $SP10->GhiChu = "";
        $SP10->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP10->save();


        $SP11 = new SanPham();
        $SP11->MaSanPham = "SP0000012";
        $SP11->TenSanPham = "Jean Paul Gaultier So Scandal";
        $SP11->ThuongHieu ="Jean Paul Gaultier" ;
        $SP11->TrangThai ="1" ;
        $SP11->GiaTien ="320000" ;
        $SP11->MoTa = "Hương đầu: Cam Đỏ, Quýt
        Hương giữa: Mật Ong, Hoa Nhài, Hoa Cam, Đào, Hoa Sơn Chi.
        Hương cuối: Sáp Ong, Caramel, Hoắc Hương, Cam Thảo.

        Scandal tiếp nối xu hướng mùi hương tông Ngọt nhưng với một điểm nhấn mới lạ và sẽ làm phong phú thêm bộ sưu tập nước hoa của Jean Paul Gaultier vào mùa xuân. Và từ đây mang đến một ngôi sao mới của thương hiệu Jean Paul Gaultier, được đặt tên là SCANDAL.

        Scandal được tạo nên với một sứ mệnh. để phá bỏ mọi rập khuôn, mang đến một cái gì đó mới mẻ và hiện đại, đồng thời mạnh mẽ và thanh lịch. Các nốt hương chính của thành phần là Cam Đỏ, Mật Ong, Hoắc Hương và Hoa Nhài. Một đặc điểm dễ nhận biết về mùi hương của Scandal rằng đây là một mùi hương ngọt ngào và béo ngậy nhờ vào nốt hương Mật Ong và Caramel. Ngọt nhưng không hề khó chịu hay nồng gắt bởi vì ở Scandal còn có những tông mùi nhẹ nhàng, nữ tính và thanh tao của hoa Nhài, hoa Sơn Chi cùng với vị ngọt ngào của những quả Cam và Đào tràn đầy năng lượng.

        Thương hiệu tuyên bố rằng họ muốn sáng tạo nên một phiên bản khác của những dòng nước hoa trước đó từ bộ sưu tập Jean Paul Gaultier mà vẫn tôn trọng DNA nổi tiếng của thương hiệu với mục tiêu là tạo ra thứ gì đó chất chơi hơn, gợi cảm và vui nhộn hơn, từ chai nước hoa đến chiến dịch quảng cáo.";
        $SP11->HinhAnh = "so_scandal.jpg";
        $SP11->LoaiKichCo = "KC01";
        $SP11->LoaiSanPham = "LSP02";
        $SP11->GhiChu = "";
        $SP11->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP11->save();

        $SP12 = new SanPham();
        $SP12->MaSanPham = "SP00000013";
        $SP12->TenSanPham = "Versace Pour Homme";
        $SP12->ThuongHieu ="Versaces" ;
        $SP12->TrangThai ="1" ;
        $SP12->GiaTien ="1790000" ;
        $SP12->MoTa = "Hương đầu: Quả chanh vàng, Cam Bergamot, Neroli, Hoa hồng tháng 5.
        Hương giữa: Hoa lục bình, Gỗ tuyết tùng, Xô thơm, Hoa phong lữ.
        Hương cuối: Đậu Tonka, Xạ hương, Amber.
        Đến từ bàn tay của nhà điều hương được mệnh danh là “chuyên gia hương tươi” Alberto Morillas,
        Versace Pour Homme đem tới cho phải mạnh một mùi hương Aromatic Fougere (Thảo mộc - Dương xỉ) nhẹ nhàng và đầy thanh lịch.
        Versace Pour Homme mở đầu với hương thơm cam chanh sảng khoái, gây một chút liên tưởng tới sự mát mẻ của Acqua di Giò, nhưng tăng lên một chút hứng khởi trong thái độ của mùi hương. Xô thơm tươi,
        xanh, sáng màu, đẩy lên một sắc thái nam tính rõ ràng theo một cách cổ điển kiểu thảo mộc cho mùi hương Versace Pour Homme. Trẻ trung, năng động nhưng cũng đủ cứng cáp và rắn rỏi.
        Về hậu hương, chai nước hoa này đem tới cho các chàng trai một hương ngọt dịu bám lấy da dai dẳng hơn hẳn những gì chúng ta có với Acqua di Giò.
        Như một lựa chọn không thể thiếu với nam giới vào những ngày oi bức, Versace Pour Homme là mùi hương được rất được ưa chuộng cho các anh đang bắt đầu tìm cho mình một mùi hương dễ chịu, dễ gần và đa dụng.";
        $SP12->HinhAnh = "versace_pour_homme.jpeg";
        $SP12->LoaiKichCo = "KC01";
        $SP12->LoaiSanPham = "LSP01";
        $SP12->GhiChu = "";
        $SP12->NguoiTao = "hothanhphuc2468@gmail.com";
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
        $SP13->HinhAnh = "moschino.jpeg";
        $SP13->LoaiKichCo = "KC01";
        $SP13->LoaiSanPham = "LSP01";
        $SP13->GhiChu = "";
        $SP13->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP13->save();

        $SP14 = new SanPham();
        $SP14->MaSanPham = "SP00000015";
        $SP14->TenSanPham = "Mr. Mr. Burberry Eau de Parfum Eau de Toliet";
        $SP14->ThuongHieu ="Burberry" ;
        $SP14->TrangThai ="1" ;
        $SP14->GiaTien ="2400000" ;
        $SP14->MoTa = "Hương đầu: Bạch đậu khấu, Bạc hà, Lá ngải giấm.
        Hương giữa: Hoa oải hương, Nhục đậu khấu, Gỗ tuyết tùng.
        Hương cuối: Hoắc hương, Quế, Nhựa hổ phách, Nhựa hương Benzoin, Cỏ hương bài, Gỗ đàn hương.

        Là một hãng được cấp Chứng chỉ Hoàng gia, Burberry có một bề dày lịch sử phát triển đáng trân trọng, chứng minh được trình độ và tên tuổi, và họ cũng là một phần tự hào của Vương quốc Anh. Với nước hoa, Burberry vẫn giữ được những nét đặc trưng lịch lãm của hãng về cả ngoại hình và mùi hương, và Mr. Burberry Eau de Parfum (Mr. Burberry EDP) cũng vậy, một mùi hương kiểu Gỗ - Thảo mộc - Gia vị, truyền thống và thân thuộc, mang đậm âm hưởng của một quý ông Anh quốc.

        Mr. Burberry EDP đem tới một mùi hương với phong cách cổ điển, và Burberry tự công nhận rằng nó không phải là một thứ hương mới lạ. Chỉ là Gỗ, Gia vị và Thảo mộc quen thuộc, nhưng được biến hóa để trở nên hiện đại và tươi mới hơn bằng những nguyên liệu được tuyển chọn kỹ lưỡng cùng bàn tay sáng tạo của bậc thầy Francis Kurkdjian. Mr. Burberry khởi đầu bằng một hỗn hợp hương Thảo mộc được hòa trộn mượt mà của Bạc hà và Ngải giấm, xen lẫn với hương Gia vị ấm áp của Quế, Bạch đậu khấu và Nhục đậu khấu. Chuyển đến tâm của mùi hương, Gỗ tuyết tùng tươi và sạch xuất hiện, làm nền cho hương Oải hương chững chạc nhưng gợi cảm, mang tới cho Mr. Burberry EDP một nét nam tính kiểu mùi hương Gỗ - Dương xỉ quen thuộc nhưng hiện đại, tươi mới và năng động. Khi mùi hương trôi dần về cuối, Mr. Burberry EDP dần dà chuyển hoàn toàn thành một quý ông trưởng thành và ấm áp, có chiều sâu hơn bằng Hoắc hương và Nhựa hương, cùng một chút ngọt ngậy dậy mùi của Gỗ đàn hương.

        Mang đậm dấu ấn cổ điển nhưng không cũ kỹ, Mr. Burberry EDP đại diện cho những quý ông trang trọng lịch lãm thời hiện đại, vừa nam tính kiểu cách phức tạp, nhưng không kém phần thanh thoát và tươi trẻ. ";
        $SP14->HinhAnh = "mrburberry.jpeg";
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
        $SP15->HinhAnh = "mrburberry_edp.jpeg";
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
        $SP16->HinhAnh = "gio_absolu_edp.jpeg";
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
        $SP17->HinhAnh = "DG_light_blue.jpeg";
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
        $SP18->HinhAnh = "allure_homme.jpeg";
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
        $SP19->HinhAnh = "Allure_Cologne.jpeg";
        $SP19->LoaiKichCo = "KC01";
        $SP19->LoaiSanPham = "LSP01";
        $SP19->GhiChu = "";
        $SP19->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP19->save();

        $SP20 = new SanPham();
        $SP20->MaSanPham = "SP00000021";
        $SP20->TenSanPham = "Roja Parfums Elysium Pour Homme Parfum";
        $SP20->ThuongHieu ="Roja" ;
        $SP20->TrangThai ="1" ;
        $SP20->GiaTien ="9900000" ;
        $SP20->MoTa = "Hương chính: Hợp hương cam chanh, oải hương, hoa lan chuông, hoa hồng tháng năm, hoa nhài vùng Grasse, táo xanh, nho đen, tiêu hồng, quả bách xù, nhựa hương, da thuộc, long diên hương, xạ hương.
        Kiệt tác thơm đương đại dành cho tuýp nam giới trẻ trung trưởng thành.
        Elysium bản parfum thanh lịch, tràn trề nhiệt năng, và không che dấu bản năng dẫn dắt, lôi cuốn, dẫn đầu.
        Thanh sạch hợp hương chanh tươi và sắc, kết hợp cùng tiêu hồng và quả bách xù, Elysium khơi gợi hiệu ứng thơm cocktail có base là vodka kèm gin rõ rệt. Hào hứng và hào sảng, hợp hương tươi tắn thanh sắc các loại quả có tép sực hương rượu tràn trề nhiệt năng, kết hợp cùng note hương da thuộc và long diên hương kiến tạo nên tuýp nam giới tích cực, hào hoa, lôi cuốn, và có gu.
        ";
        $SP20->HinhAnh = "Roja_parfume_elysium.jpeg";
        $SP20->LoaiKichCo = "KC01";
        $SP20->LoaiSanPham = "LSP05";
        $SP20->GhiChu = "";
        $SP20->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP20->save();

        $SP21 = new SanPham();
        $SP21->MaSanPham = "SP00000022";
        $SP21->TenSanPham = "Ormonde Jayne QI Parfum";
        $SP21->ThuongHieu ="Ormonde" ;
        $SP21->TrangThai ="1" ;
        $SP21->GiaTien ="6800000" ;
        $SP21->MoTa = "Nước hoa này được lấy cảm hứng từ tình yêu của người dân Trung Hoa dành cho những mùi hương nhẹ nhàng và tinh tế nhất. Mùi hương của Qi mong manh như làn khói nhưng dai dẳng khôn nguôi. Không quá ồn ào kỳ vỹ, không làm tổn thương đến ai, nhưng sẽ làm vương vấn cho ai đó nếu vô tình chạm phải mùi hương này.

        Qi không phá bỏ bất kỳ bức tường vĩ đại nào, mà là một thứ gì đó ngoạn mục hơn, giống như một bình minh tuyệt vời, một làn gió mỏng manh thơm nhẹ. Qi là một loại nước hoa tự nhiên, cởi mở, nhưng rất là thanh khiết. Nó tạo dấu ấn cho những ai không muốn quá rõ ràng nhưng có thể cảm thấy chưa hoàn thành nếu không có nó.

        Qi có độ lưu hương lâu: 6 giờ đến 12 giờ và độ tỏa hương thuộc dạng rất xa: toả hương trong vòng bán kính trên 2 mét. Qi phù hợp để sử dụng trong cả ngày lẫn đêm vào mùa xuân, hạ. Bên cạnh đó, Trà và Hoa chanh vàng là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.";
        $SP21->HinhAnh = "QI.jpeg";
        $SP21->LoaiKichCo = "KC01";
        $SP21->LoaiSanPham = "LSP05";
        $SP21->GhiChu = "";
        $SP21->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP21->save();

        $SP22 = new SanPham();
        $SP22->MaSanPham = "SP00000023";
        $SP22->TenSanPham = "Roja Parfums Oceania Limited";
        $SP22->ThuongHieu ="Roja" ;
        $SP22->TrangThai ="1" ;
        $SP22->GiaTien ="9900000" ;
        $SP22->MoTa = "Vào năm 2009, thương hiệu nước hoa niche đắt tiền Roja Dove đã cho ra mắt nước hoa Roja Parfums Oceania Limited dành cho cả nam lẫn nữ trong sự hào hứng của các tín đồ về thương hiệu nước hoa này.

        Roja Parfums Oceania Limited là một loại nước hoa thiên về sự trải nghiệm cảm xúc vô tận của đại dương, một hương vị biển được sáng tạo từ các nguyên liệu tự nhiên đắc giá. Oceania là mùi hương cởi mở, thoáng đãng, phù hợp dùng cho mọi hoàn cảnh, mọi điều kiện thời tiết. Kết cấu mùi được hoàn thiện tinh tế, chỉn chu, song có tính ứng dụng cao, rất được yêu thích bởi cả hai giới.";
        $SP22->HinhAnh = "Roja_Oceania.jpeg";
        $SP22->LoaiKichCo = "KC01";
        $SP22->LoaiSanPham = "LSP05";
        $SP22->GhiChu = "";
        $SP22->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP22->save();


        $SP23 = new SanPham();
        $SP23->MaSanPham = "SP00000024";
        $SP23->TenSanPham = "Diptyque Tam Dao EDP";
        $SP23->ThuongHieu ="Diptyque" ;
        $SP23->TrangThai ="1" ;
        $SP23->GiaTien ="4350000" ;
        $SP23->MoTa = "Một mùi hương thật đẹp, không cầu kỳ. Tamdao EDP hiện lên là mùi gỗ tinh khiết, trong trẻo, mát lạnh, hơi creamy một chút, pha lẫn trong đó là mùi hơi âm ẩm của rêu sồi. Cảm giác như trước mắt là một bức tường đá cổ kính, phủ trên đó là màu xanh cũ kĩ của rêu sồi, và phả vào ta là hơi sương sớm mát lạnh trong một khu rừng vậy.

        Là nguồn hứng khởi được đong đếm bằng mùi hương, Diptyque Tam Dao EDP không đơn giản chỉ là nước hoa, mà nó chính là cảm xúc. Những cảm xúc đắt tiền.";
        $SP23->HinhAnh = "Diptyque_tamdao.jpeg";
        $SP23->LoaiKichCo = "KC01";
        $SP23->LoaiSanPham = "LSP05";
        $SP23->GhiChu = "";
        $SP23->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP23->save();

        $SP24 = new SanPham();
        $SP24->MaSanPham = "SP00000025";
        $SP24->TenSanPham = "Diptyque Do Son EDP";
        $SP24->ThuongHieu ="Diptyque" ;
        $SP24->TrangThai ="1" ;
        $SP24->GiaTien ="3950000" ;
        $SP24->MoTa = "Một mùi hương thật đẹp, không cầu kỳ. Tamdao EDP hiện lên là mùi gỗ tinh khiết, trong trẻo, mát lạnh, hơi creamy một chút, pha lẫn trong đó là mùi hơi âm ẩm của rêu sồi. Cảm giác như trước mắt là một bức tường đá cổ kính, phủ trên đó là màu xanh cũ kĩ của rêu sồi, và phả vào ta là hơi sương sớm mát lạnh trong một khu rừng vậy.

        Là nguồn hứng khởi được đong đếm bằng mùi hương, Diptyque Do Son EDP không đơn giản chỉ là nước hoa, mà nó chính là cảm xúc. Những cảm xúc đắt tiền.";
        $SP24->HinhAnh = "Diptyque_doson.jpeg";
        $SP24->LoaiKichCo = "KC01";
        $SP24->LoaiSanPham = "LSP05";
        $SP24->GhiChu = "";
        $SP24->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP24->save();

        $SP25 = new SanPham();
        $SP25->MaSanPham = "SP00000026";
        $SP25->TenSanPham = "Byredo Sunday Cologne EDP";
        $SP25->ThuongHieu ="Byredo" ;
        $SP25->TrangThai ="1" ;
        $SP25->GiaTien ="2650000" ;
        $SP25->MoTa = "Hương chính: Cam bergamot, Cỏ hương bài và hoa tím
        Một quý ông đĩnh đạc và lịch thiệp, một quý cô kiêu kì và quyến rũ. Đó như là mặt nạ mà ai cũng phải mang ngoài xã hội.
        Về nhà, chúng ta chỉ mưu cầu sự thư giãn và là chính mình. Ngày Chủ Nhật là ngày duy nhất trong tuần mà chúng ta hoàn toàn có thể buông thả mọi thứ để tìm đến sự nhẹ nhàng và an yên.";
        $SP25->HinhAnh = "Byredo_Sunday.jpeg";
        $SP25->LoaiKichCo = "KC01";
        $SP25->LoaiSanPham = "LSP05";
        $SP25->GhiChu = "";
        $SP25->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP25->save();

        $SP26 = new SanPham();
        $SP26->MaSanPham = "SP00000027";
        $SP26->TenSanPham = "Byredo Pulp EDP EDP";
        $SP26->ThuongHieu ="Byredo" ;
        $SP26->TrangThai ="1" ;
        $SP26->GiaTien ="2650000" ;
        $SP26->MoTa = "PULP được biết đến như một đại sứ thương hiệu cho nhà Byredo. Khi nhắc tới Byredo, không thể không nhắc đến PULP-đại diện cho hương nước hoa trái cây với vẻ đẹp về mùi hương cũng như sự toàn vẹn cho khướu giác.
        PULP xứng đáng là một chai nước hoa mang cảm giác tươi mát như ly cocktail cho những ngày hè oi ả. Mở đầu bằng hỗn hợp trái cây ngọt ngào Cam bergamot, Bạch đậu khấu và quả Lý chua đen, một chút e thẹn và ngại ngùng. Nhưng điều đấy lại làm PULP trở nên mạnh mẽ, muốn thể hiện mình ở những nốt chính của quả sung, một ít sự hào sảng của táo đỏ và hoa Tiare.";
        $SP26->HinhAnh = "Byredo_Pulp.jpeg";
        $SP26->LoaiKichCo = "KC01";
        $SP26->LoaiSanPham = "LSP05";
        $SP26->GhiChu = "";
        $SP26->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP26->save();

        $SP27 = new SanPham();
        $SP27->MaSanPham = "SP00000028";
        $SP27->TenSanPham = "Amouage Interlude 53 Man Extrait EDP";
        $SP27->ThuongHieu ="Amouage" ;
        $SP27->TrangThai ="1" ;
        $SP27->GiaTien ="4790000" ;
        $SP27->MoTa = "Với những người yêu hương, hẳn không ai không biết tới sáng tạo mang tính biểu tượng nhất của Amouage - Interlude Man.

        Sau 8 năm phát hành và tạo được tiếng vang lớn, Amouage đã quyết định nâng cấp Interlude lên một tầm cao mới . Đây thực sự là một quyết định táo bạo và đầy mạo hiểm bởi khi Interlude Man đã quá thành công thì nâng cấp lên một phiên bản khác đậm đặc hơn liệu có khiến nó thoát khỏi cái bóng của bản gốc và vượt lên tạo được một bước tiến vang dội";
        $SP27->HinhAnh = "Amouage_interlude53.jpeg";
        $SP27->LoaiKichCo = "KC01";
        $SP27->LoaiSanPham = "LSP05";
        $SP27->GhiChu = "";
        $SP27->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP27->save();

        $SP28 = new SanPham();
        $SP28->MaSanPham = "SP00000029";
        $SP28->TenSanPham = "Kilian Angels' Share EDP";
        $SP28->ThuongHieu ="Kilian" ;
        $SP28->TrangThai ="1" ;
        $SP28->GiaTien ="4790000" ;
        $SP28->MoTa = "Angel's Share mang chúng ta đến với một quầy bar cổ điển trên một con đường của đất nước Pháp xinh đẹp. Bước vào quán ta có thể dễ dàng cảm nhận hương rượu Cognac thoang thoảng. Ngồi xuống và người bartender nhanh chóng đưa cho bạn một ly rượu, đó là một ly Brabdy mix Smoke, là sự pha trộn của Cognac, quế ấm nồng, vanille ngọt thanh thoát và gỗ sáng rực rỡ. Thưởng thức vị ngon ấy làm cho tâm hồn bạn bỗng trở nên ấm áp trong cái lạnh khi cơn gió mùa thu đông đã kéo về.";
        $SP28->HinhAnh = "Angel_share.jpg";
        $SP28->LoaiKichCo = "KC01";
        $SP28->LoaiSanPham = "LSP06";
        $SP28->GhiChu = "";
        $SP28->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP28->save();

        $SP29 = new SanPham();
        $SP29->MaSanPham = "SP00000030";
        $SP29->TenSanPham = "Louis Vuitton Spell On You EDP";
        $SP29->ThuongHieu ="Louis Vuitton" ;
        $SP29->TrangThai ="1" ;
        $SP29->GiaTien ="8790000" ;
        $SP29->MoTa = "Louis Vuitton Spell On You là thành viên mới nhất được ra mắt trong BST Les Parfum của thương hiệu Louis Vuitton. Nhà sáng tạo gửi gắm mùi hương này đến với mọi cô gái ngày nay. Nó dành tặng cho các nàng một sự quyến rũ khó diễn tả, hương thơm tỏa ra sức quyến rũ mạnh mẽ. Louis Vuitton Spell On You giống như một câu thần chú phù phép lên cơ thể nàng. Câu thần chú này mang mùi hương vừa tinh tế lại vừa mê hoặc bởi hỗn hợp mùi hương đến từ nhóm hương hoa cỏ. Tạo nên một người phụ nữ vừa lãng mạn, nhẹ nhàng vừa lại là người yêu cái đẹp và thích chinh phục.";
        $SP29->HinhAnh = "LV_Spell_On_You.jpeg";
        $SP29->LoaiKichCo = "KC01";
        $SP29->LoaiSanPham = "LSP06";
        $SP29->GhiChu = "";
        $SP29->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP29->save();

        $SP30 = new SanPham();
        $SP30->MaSanPham = "SP00000031";
        $SP30->TenSanPham = "Kilian Rose On Ice EDP";
        $SP30->ThuongHieu ="Kilian" ;
        $SP30->TrangThai ="1" ;
        $SP30->GiaTien ="4790000" ;
        $SP30->MoTa = "Kilian Rose On Ice quả thật xứng đáng, rất xứng đáng để trông chờ là đằng khác bởi tính phức tạp trong cách cấu thành mùi hương. Bởi khi đi đến tầng hương thứ hai, màn sương như biến mất, thay vào đó tôi lại mường tượng đến hình ảnh một thiếu nữ. Tôi không gọi đây là người phụ nữ, bởi mùi hương Hoa hồng lần này lại trẻ trung đến lạ, ấy thế, thiếu nữ trong Kilian Rose On Ice không hoạt bát, không hồn nhiên cũng không ngây thơ nốt, mà mang mác một nét trầm tư. Hay tôi phải gọi đúng hơn là nàng có đôi mắt buồn và thăm thẳm.";
        $SP30->HinhAnh = "Rose_on_ice.jpeg";
        $SP30->LoaiKichCo = "KC01";
        $SP30->LoaiSanPham = "LSP06";
        $SP30->GhiChu = "";
        $SP30->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP30->save();

        $SP31 = new SanPham();
        $SP31->MaSanPham = "SP00000032";
        $SP31->TenSanPham = "Tom Ford Bitter Peach EDP";
        $SP31->ThuongHieu ="Tom Ford" ;
        $SP31->TrangThai ="1" ;
        $SP31->GiaTien ="4250000" ;
        $SP31->MoTa = "Tom Ford Bitter Peach mang đến cho người thưởng thức hương vị đào ngọt ngào chín mọng nước, kết hợp cùng vị chua của ca làm tăng cường sự cân bằng giữa ngọt và chua trong một mùi hương. Thành phần dầu davana pha trong rượu rum và bạch đậu khấu tạo thêm sự ấm áp cho hương thơm. Mùi hương phóng khoáng, bí ẩn của tinh dầu hoắc hương và sang trọng thanh lịch hơn với mùi gỗ đàn hương. Nốt hương cuối cùng là sự xuất hiện của gỗ và vani, một điểm nhấn đặc trưng có trong rất nhiều hương thơm khác của nhà Tom Ford. ";
        $SP31->HinhAnh = "TF_bitter.jpg";
        $SP31->LoaiKichCo = "KC01";
        $SP31->LoaiSanPham = "LSP06";
        $SP31->GhiChu = "";
        $SP31->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP31->save();

        $SP32 = new SanPham();
        $SP32->MaSanPham = "SP00000033";
        $SP32->TenSanPham = "Tom Ford Rose Trick EDP";
        $SP32->ThuongHieu ="Tom Ford" ;
        $SP32->TrangThai ="1" ;
        $SP32->GiaTien ="4250000" ;
        $SP32->MoTa = "Hương đầu: Tiêu Tứ Xuyên, Củ nghệ.
        Hương giữa: Hoa hồng tháng Năm, Hoa hồng Bulgaria, Hoa hồng Thổ Nhĩ Kỳ.
        Hương cuối: Hoắc hương, Đậu Tonka.
        Hoa hồng đẹp và kiêu kỳ nên thường được cưng chiều gọi bằng cái tên điệu đà và mỹ miều là Nữ hoàng của các loài hoa. Cũng giống với việc mỗi vương quốc chỉ có một nữ hoàng, ta thường chỉ gặp một loại Hoa hồng trong một chai nước hoa, rằng mùi hương đó như địa hạt mà bông Hồng cai trị.";
        $SP32->HinhAnh = "TF_rose.jpeg";
        $SP32->LoaiKichCo = "KC01";
        $SP32->LoaiSanPham = "LSP06";
        $SP32->GhiChu = "";
        $SP32->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP32->save();

        $SP33 = new SanPham();
        $SP33->MaSanPham = "SP00000034";
        $SP33->TenSanPham = "Parfums de Marly Cassili Royal Essence";
        $SP33->ThuongHieu ="Parfums de Marly" ;
        $SP33->TrangThai ="1" ;
        $SP33->GiaTien ="5550000" ;
        $SP33->MoTa = "Hương đầu: Nho đỏ, hoa hồng Bulgari, hoa trắng
        Hương giữa: hoa mimosa, hoa đại, hương petalia.
        Hương cuối: gỗ đàn hương, vỏ vanilla, đậu tonka
        Parfums De Marly Cassili Royal Essence EDP là hương thơm mới vừa được ra mắt vào 2019 từ thương hiệu nước hoa đình đám Thế Giới mà các tín đồ yêu hương gọi đây là thứ mùi sang chảnh mà bất kỳ ai cũng từng bắt gặp trong tất cả các khách sạn Năm Sao”, gặp một lần là nhớ nhung mê luyến không dứt được.";
        $SP33->HinhAnh = "PDM_cassili.jpeg";
        $SP33->LoaiKichCo = "KC01";
        $SP33->LoaiSanPham = "LSP06";
        $SP33->GhiChu = "";
        $SP33->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP33->save();

        $SP34 = new SanPham();
        $SP34->MaSanPham = "SP00000035";
        $SP34->TenSanPham = "Kilian Rolling In Love EDP";
        $SP34->ThuongHieu ="Kilian" ;
        $SP34->TrangThai ="1" ;
        $SP34->GiaTien ="5250000" ;
        $SP34->MoTa = "Hương đầu: Cây vông vang, Hạnh nhân
        Hương giữa: Lan nam phi, Diên vĩ
        Hương cuối: Vanilla, Xạ hương, Đậu tonka, Hoa vòi voi
        Rolling In Love nói cho tròn nghĩa, từng tầng hương thể hiện từng giai đoạn của chúng ta mỗi khi yêu. Nếu tầng hương đầu khởi sắc đầy phá cách, bùng nổ những tông vị ngọt sắc, thì tầng hương giữa lại dịu dàng, nền nã hơn bao giờ hết. Yêu một ai đủ lâu, ta ắt sẽ muốn tìm thấy bình yên khi ở bên cạnh họ. Cho đến tầng hương cuối, tình yêu lại trở nên mặn nồng và sắc nét nhất khi được là tâm giao với đúng người, đúng thứ mình yêu.";
        $SP34->HinhAnh = "Kilian_RIL.jpeg";
        $SP34->LoaiKichCo = "KC01";
        $SP34->LoaiSanPham = "LSP06";
        $SP34->GhiChu = "";
        $SP34->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP34->save();

        $SP36 = new SanPham();
        $SP36->MaSanPham = "SP00000036";
        $SP36->TenSanPham = "Moschino Toy 2 EDP";
        $SP36->ThuongHieu ="Moschino" ;
        $SP36->TrangThai ="1" ;
        $SP36->GiaTien ="1500000" ;
        $SP36->MoTa = "Moschino Toy 2 EDP

        Nếu bạn đang tìm một chai nước hoa ăn điểm cả về ngoại hình lẫn mùi hương, thì MOSCHINO TOY 2 là một lựa chọn khá chính xác đấy!!

         TOY 2 là một phiên bản mới được MOSCHINO giới thiệu vào năm 2018 sau thành công của chai nước hoa TOY vào 4 năm trước.

         Như một phiên bản nâng cấp hơn, TOY 2 xuất hiện với ngoại hình cực kì bắt mắt: chú gấu thủy tinh với phần thân trong suốt và chiếc đầu nhỏ nhắn như đang ôm trọn lấy phần chai nước hoa còn lại. ";
        $SP36->HinhAnh = "moschino_toy2.jpeg";
        $SP36->LoaiKichCo = "KC01";
        $SP36->LoaiSanPham = "LSP02";
        $SP36->GhiChu = "";
        $SP36->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP36->save();

        $SP37 = new SanPham();
        $SP37->MaSanPham = "SP00000037";
        $SP37->TenSanPham = "Thierry Mugler Alien EDP";
        $SP37->ThuongHieu ="Thierry Mugler" ;
        $SP37->TrangThai ="1" ;
        $SP37->GiaTien ="2750000" ;
        $SP37->MoTa = " Alien với thân chai được làm bằng thủy tinh mang màu tím sẫm lạ mắt, kết hợp với viền trang trí quanh thân chai màu vàng cùng dòng chữ 'Alien'
        với font chữ lạ mắt như một loại bùa chú nào đó. Dễ dàng khiến người nhìn thu hút và liên tưởng ngay đến một viên đá quý đầy quyền lực của các phù thủy cổ xưa,
         hay một loại đá phép thuật huyền ảo và lạ kì.  Hương thơm của Alien đơn giản và độc đáo chỉ với 3 note hương chính hòa vào nhau: hoa nhài, hổ phách và hương gỗ.
         Hương thơm quyến rũ và bí ẩn của Alien bắt đầu với một chút nồng nàn mùi hoa nhài và hổ phách, để rồi tạo nên sự thu hút hơn khi các note hương vơi bớt. Để lại trên da một làn hương dịu nhẹ, dễ chịu nhưng vẫn độc lạ.";
        $SP37->HinhAnh = "Alien.jpeg";
        $SP37->LoaiKichCo = "KC01";
        $SP37->LoaiSanPham = "LSP02";
        $SP37->GhiChu = "";
        $SP37->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP37->save();

        $SP38 = new SanPham();
        $SP38->MaSanPham = "SP00000038";
        $SP38->TenSanPham = "Armaf Club De Nuit Women EDP";
        $SP38->ThuongHieu ="Armaf" ;
        $SP38->TrangThai ="1" ;
        $SP38->GiaTien ="850000" ;
        $SP38->MoTa = "Club De Nuit Women của nhã hiệu nước hoa Armaf là một mùi hương nước hoa thuộc nhóm hương trái cây dành cho nữ. Hương đầu là cam bergamot, bưởi, đào, cam. Nốt hương giữa là sự hòa trộn tinh tế của hoa phong lữ, hoa nhài, hoa hồng và vải thiều. Nốt hương cuối là hoắc hương, xạ hương, vanilla và cỏ vertiver. Hương thơm này được các chuyên gia đánh giá tương tự như đàn chị Chanel Coco Mademoiselle đã lừng danh bấy lâu này, nhưng giá cả chỉ bằng 1/3. ";
        $SP38->HinhAnh = "CDN.jpeg";
        $SP38->LoaiKichCo = "KC01";
        $SP38->LoaiSanPham = "LSP02";
        $SP38->GhiChu = "";
        $SP38->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP38->save();

        $SP39 = new SanPham();
        $SP39->MaSanPham = "SP00000039";
        $SP39->TenSanPham = "Narciso Rodriguez For Her EDP";
        $SP39->ThuongHieu ="Narciso Rodriguez" ;
        $SP39->TrangThai ="1" ;
        $SP39->GiaTien ="3450000" ;
        $SP39->MoTa = "Narciso Rodriguez For Her – Khi nước hoa mang mùi hương da thịt ✨
        🌸 Đã từng được nhắc đến cách đây không lâu trong các bài viết của Chietnuochoa, đặc điểm chung của các dòng nước hoa nhà Narciso là note xạ hương không thể nhầm lẫn. Và trong số đó, Narciso Rodriguez For Her (EDP) là được đánh giá là hương xạ nổi bật nhất, ma mị và quyến rũ hơn so với các phiên bản Narciso trước và sau nó.
        🌸 Không dành cho các cô gái trẻ còn ngây thơ trong sáng, xạ hương của Narciso thấm đẫm vị ái tình, là hương thơm trên da người phụ nữ từng trải và hoang dại. Thoang thoảng hoa hồng kết hợp cùng vị đào xen lẫn, những note hương đầu tiên như vẫn còn e ấp phấn son. Nhưng khi mùi đào qua đi rồi, những gì còn lại trên da chỉ là hoa hồng thơm ngát và xạ hương quyến rũ. Được xử lý rất khéo nên xạ hương của Narciso EDP không gây cho người đối diện cảm giác ngột ngạt, đó là mùi xạ hương được quện chặt vào da và thơm như chính mùi da thịt vậy, nhưng tinh tế và nữ tính hơn rất nhiều. Do đó, lọ nước hoa nhiều lần được bình chọn là mùi hương thích hợp nhất để dùng khi đi hẹn hò. Còn gì bằng một buổi tối se lạnh, bôi một chút Narciso ở cổ tay và trao nhau những lời yêu thương mật ngọt. Hương hoa hồng xen lẫn xạ hương dịu dàng mà vẫn quyến rũ như dư vị của một nụ hôn 💋";
        $SP39->HinhAnh = "Narforher.jpeg";
        $SP39->LoaiKichCo = "KC01";
        $SP39->LoaiSanPham = "LSP02";
        $SP39->GhiChu = "";
        $SP39->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP39->save();

        $SP40 = new SanPham();
        $SP40->MaSanPham = "SP00000040";
        $SP40->TenSanPham = "Narciso Rodriguez Musc Noir Rose EDP";
        $SP40->ThuongHieu ="Narciso Rodriguez" ;
        $SP40->TrangThai ="1" ;
        $SP40->GiaTien ="2700000" ;
        $SP40->MoTa = "Trước khi nói thêm điều gì về Musc Noir Rose, thì ta phải nhấn mạnh rằng, dù mang cái tên Rose, nhưng ấn phẩm mùi hương này từ nhà Narciso lại không hề chưng cất chút tinh chất nào của Hoa hồng. Mà đúng hơn, Rose ở đây ám chỉ cho sắc hồng qua ánh nhìn của người thiếu nữ, và cũng là tông màu chủ đạo cho thiết kế chai.
        Ấy vậy, khi đào sâu hơn về ý nghĩa của mùi hương, bóc tách từng lớp, ta sẽ thật sự nhận ra với khứu giác tinh tường của mình, rằng những cá thể đơn lẻ khi hợp lại sẽ tạo nên thứ hương bồng bềnh, vui tươi và dễ yêu như chính sắc hồng mà Musc Noir Rose mang.
        Nó là kết tinh của chút ngọt thanh của Mận, hoà vào vẻ thanh tao, nhã nhặn của Cam Bergamot và Tiêu Hồng. Hít một hơi thật sâu, và sự miên man, đậm đà của Hoa Huệ đã ở đó. Chúng va vào nhau, ăn nhập và bung toả nét đẹp phương phi khó tả. Chọn kết thúc hành trình hương sắc của mình với Vanilla và Da thuộc, vị ngọt đẫm hương phấn quyện cùng vị ngọt day dặn đầy xác thịt, Musc Noir Rose cuối cùng để lại cho người ta cái cảm giác bồng bềnh, lãng đãng khó quên ";
        $SP40->HinhAnh = "Nar_MNoir.jpeg";
        $SP40->LoaiKichCo = "KC01";
        $SP40->LoaiSanPham = "LSP02";
        $SP40->GhiChu = "";
        $SP40->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP40->save();

        $SP41 = new SanPham();
        $SP41->MaSanPham = "SP00000041";
        $SP41->TenSanPham = "Christian Dior Joy Intense EDP";
        $SP41->ThuongHieu ="Christian Dior" ;
        $SP41->TrangThai ="1" ;
        $SP41->GiaTien ="3150000" ;
        $SP41->MoTa = "🌸 JOY BY DIOR - HẠNH PHÚC CÓ HƯƠNG GÌ?? 🌸

        ✨ Tiếp nối thành công của Dior Joy, vào giữa năm 2019 này Christian Dior tiếp tục cho ra mắt một phiên bản nâng cấp hơn của Dior Joy. Sâu sắc hơn, nữ tính hơn, đậm đà hơn, đó là Dior Joy Intense. Với phong cách gợi cảm, lãng mạn, tươi sáng và thanh lịch cho người dùng, Joy Intense by Dior hứa hẹn là một mùi hương không thể bỏ qua của các tín đồ nước hoa. Cập nhật cùng xu hướng thế giới, Chietnuochoa vừa về lọ nước hoa nhỏ màu hồng phấn xinh xắn này, vội vàng làm một quick review đến với các khách hàng thân thiết của shop 😌

        - “Hạnh phúc có hương của gì? Của hoa hồng cánh mỏng mới cắt từ vườn quê, của trái cam mới bổ đôi tứa nước, của gỗ ấm và xạ hương nồng thủ thỉ gần nhau đi thế vẫn còn xa lắm...” - Blogger Nàng Thơ viết về JOY.";
        $SP41->HinhAnh = "Dior_Joy.jpeg";
        $SP41->LoaiKichCo = "KC01";
        $SP41->LoaiSanPham = "LSP02";
        $SP41->GhiChu = "";
        $SP41->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP41->save();

        $SP42 = new SanPham();
        $SP42->MaSanPham = "SP00000042";
        $SP42->TenSanPham = "Valentino Uomo EDT";
        $SP42->ThuongHieu ="Valentino" ;
        $SP42->TrangThai ="1" ;
        $SP42->GiaTien ="2450000" ;
        $SP42->MoTa = "Lấy cảm hứng từ một ngày nắng đẹp tại Venice – thành phố màu nhiệm nhất châu Âu với vẻ đẹp lãng mạn đến mê mẩn, nước hoa Valentino Uomo EDT 100ml được Valentino tạo nên như một dấu ấn dành cho phái mạnh. Ý tưởng sáng tạo nên Valentino Uomo Eau De Toilette hướng tới đấng mày râu theo đuổi phong cách cổ điển và đơn giản. Hương thơm chất lượng, liên hệ mật thiết với những “siêu phẩm” thời trang từ Valentino. Quảng bá cho dòng sản phẩm đình đám này, địa điểm lý tưởng được lựa chọn chính là Rome – thành phố vĩnh hằng tại Ý.";
        $SP42->HinhAnh = "Valentino_uomo.jpeg";
        $SP42->LoaiKichCo = "KC01";
        $SP42->LoaiSanPham = "LSP01";
        $SP42->GhiChu = "";
        $SP42->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP42->save();

        $SP43 = new SanPham();
        $SP43->MaSanPham = "SP00000043";
        $SP43->TenSanPham = "Viktor & Rolf Spicebomb Infrared EDT";
        $SP43->ThuongHieu ="Viktor & Rolf" ;
        $SP43->TrangThai ="1" ;
        $SP43->GiaTien ="2350000" ;
        $SP43->MoTa = "Lần đầu tiên khi xịt Infrared, nó khiến tôi nhớ đến phiên bản Spicebomb Original, bởi mùi hương khá giống bản gốc, nhưng Infrared đậm hơn, cay hơn và ngọt hơn. Infrared bắt đầu với vị ngọt cay từ red fruit và hạt tiêu hồng.
        Nhưng đến hương giữa, nó bắt đầu chuyển sang mùi cay của ớt, với vị ngọt nhạt dần nhưng không mất hẳn. Trong khi tất cả đều có chung một DNA thì Infrared giống bản gốc nhất, nhưng được bổ sung thêm một số note trái cây màu đỏ, vừa đủ để cân bằng các loại gia vị.";
        $SP43->HinhAnh = "VR_Spice_Infraned.jpeg";
        $SP43->LoaiKichCo = "KC01";
        $SP43->LoaiSanPham = "LSP01";
        $SP43->GhiChu = "";
        $SP43->NguoiTao = "hothanhphuc2468@gmail.com";
        $SP43->save();
    }
}
