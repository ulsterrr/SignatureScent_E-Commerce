<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TinTuc;
class TinTucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $TinTuc = new TinTuc();
        $TinTuc->TieuDe = 'Mandorlo Di Sicilia của ACQUA DI PARMA';
        $TinTuc->PhuDe = 'Mandorlo Di Sicilia của ACQUA DI PARMA là một mùi hương thanh lịch, ngọt ngào và thoang thoảng âm vị thực phẩm.';
        $TinTuc->NoiDung = 'Mùi hương của hỗn hợp vani + hạnh nhân nói trên được mô tả đôi khi giống như mùi bánh hạnh nhân, đôi khi giống mùi sữa trứng vani beo béo.
        Như đã đề cập, trong Mandorlo Di Sicilia còn có hoa ylang và hồi hương như làm dịu lại mùi hương, kết hợp với quả đào và hương vani làm mùi hương càng trở nên mượt mà hơn.
        Tất cả những note hương này đều được lồng ghép vào nhau một cách tuyệt vời, hài hòa và bổ trợ lẫn nhau dựa trên thành phần chính.
        Ở tầng hương cuối, mùi hương dần trở nên nhẹ nhàng bởi mùi xạ hương và hoa cỏ. Là một mùi hương nhóm Gour.mand, quyến rũ và có thể sử dụng được trong những mùa ấm.';
        $TinTuc->Anh1 = 'c5805deb1d85ccdb9594.jpg';
        $TinTuc->Anh2 = 'z2426880277851-8212c5389121304d3ce5a03d80e7a40a.jpg';
        $TinTuc->Anh3 = 'z2426880383209-e9ee1538d76741867cca6c6c3f8c46f4.jpg';
        $TinTuc->save();

        $TinTuc1 = new TinTuc();
        $TinTuc1->TieuDe = 'Prada Luna Rossa Black - Lối sống xa xỉ sau màn đêm.';
        $TinTuc1->PhuDe = 'Trong giới sành, nghiện và sưu tầm nước hoa, hẳn ai cũng biết đến bộ sưu tập nước hoa kinh điển Luna Rossa của nhà Prada. Và với những biến thể từ bản gốc được ra mắt từ năm 2012, người con thứ 7, với tên gọi là Prada Luna Rossa Black được ra mắt vào năm 2018 có lẽ là thứ khiến mọi người phải thốt lên một cách đầy kinh ngạc, gã này thật phi thường.';
        $TinTuc1->NoiDung = 'Tôi thường ví von với những người bạn rằng Prada Luna Rossa Black đen đúng nghĩa như cái tên gọi của nó, hay đen như cái bề ngoài đầy ma mị, bóng bẩy nhưng bí ẩn đến thu hút. Bạn có biết đến những nhà hàng sang trọng được trang trí theo tone màu chủ đạo đen hoặc xám, những hầm rượu vang đắt đỏ tối tăm với những ánh đèn vàng le lói, hay những quán bar xa xỉ nằm trong các khu nghỉ dưỡng dành cho giới thượng lưu, nếu bạn cầm trên tay Prada Luna Rossa Black, xịt nó lên người, những thứ xa xỉ đầy tối tăm, huyền bí và đắt đỏ kia sẽ hiển hiện trước mắt của bạn vậy. Thật khó để tìm kiếm thêm những mỹ từ nào để dành cho nhà mốt Prada với tuyệt phẩm Luna Rossa Black, và cũng chẳng có nhà phê bình nước hoa nào quên được cái tên Daniela Andrier khi ông sáng tạo ra gã đàn ông đen tối này.

        Cam Bergamot chế ngự hương đầu, nhưng bạn sẽ chẳng ngửi thấy rõ mùi vị của nó đâu, bởi sự mạnh mẽ và cuốn hút đầy mê hoặc của Cây bạch chỉ mới là tâm điểm của mọi sự chú ý. Cây bạch chỉ cùng hương Coumarin, cây bạch chỉ cùng Hổ phách, nó mang lại sự ám ảnh của vẻ đẹp huyền bí, sang trọng đầy tinh tế, cuốn mọi giác quan của người đối diện vào sự xa hoa, xa xỉ theo cách tự nhiên nhất. Xạ hương cũng góp mặt trong tầng hương cuối của Prada Luna Rossa Black để tăng thêm sự thu hút cho gã đàn ông này, một kẻ giàu có, nam tính với sự khiêu khích chẳng thể nào bỏ qua. ';
        $TinTuc1->Anh1 = '312233903-507076148101252-688271149099600575-n.jpg';
        $TinTuc1->Anh2 = 'prada-luna-rossa-black-eau-de-parfum-50ml-01.jpg';
        $TinTuc1->Anh3 = 'c275cfeab4c254544a1e5fd630f8d4cd.jpg';
        $TinTuc1->save();

        $TinTuc2 = new TinTuc();
        $TinTuc2->TieuDe = 'Another Tea - Trà và nửa phần còn lại của thế giới mùi hương.';
        $TinTuc2->PhuDe = 'Trước khi ngửi Another Tea của Mith thì hãy cứ tưởng tượng em nó như trà của Ki.lian Imperial Tea ( Loại trà đỉnh cao đã tuyệt chủng từ rất lâu) nhưng độ bám toả tốt hơn rất nhiều.';
        $TinTuc2->NoiDung = 'Mùi trà đáng có và hiếm có, vì quá đẹp, quá nên thơ và quá tình. Thứ trà chân thành, trang nhã, giản dị, không cần phải liệt kê note mùi phức tạp.
        Tách trà ô long được ủ với nhài rất kĩ, bởi nó có vị chát nhẹ rất rõ ràng thơm lựng mùi nhài mà khi vừa chạm khứu giác ai cũng sẽ nhận ra :À đó là hoa nhài
        Trà của Another Tea chân thật tựa như ta ngồi thưởng một ly trà mát, bên suối, bên cỏ cây, trong cái không khí thanh sạch, khi tâm thế trong sáng an yên. Nhắm mắt thưởng trà, tưởng như bao chuyện thế sự theo gió thoảng mây bay….';
        $TinTuc2->Anh1 = 'z4385620951514-eb47f152409186e96e51ae9010a744a8.jpg';
        $TinTuc2->Anh2 = 'z4385594636141-369a061dcfd6865b6a31a59bf1629d6a.jpg';
        $TinTuc2->Anh3 = 'z4385594635832-4237e098b65e37e687dbac9b1457e042.jpg';
        $TinTuc2->save();

        $TinTuc3 = new TinTuc();
        $TinTuc3->TieuDe = 'Armaf Tres Nuit - Bản sao rất tốt của Creed Green Irish Tweed.';
        $TinTuc3->PhuDe = 'Creed Green Irish Tweed là một trong những chai tiên phong của nhà Creed (nằm trong top 5 của Creed theo Jeremy).
        Với mùi Hương lá xanh hòa lẫn vào hoa, mát mẻ. Độc đáo nhưng không kén người sử dụng. Đa dụng, sử dụng trong mọi tình huống (đi làm, đi chơi, hẹn hò) mọi thời tiết.';
        $TinTuc3->NoiDung = '
        "Trong những con clone Creed Green Irish Tweed trong tầm giá dưới 1tr mình đã xài qua, thì con này cân bằng nhất giữa mùi bám tỏa, xanh kiểu thảo mộc, mượt mà nhưng thiếu đi chút tối và cứng cỏi của Creed, bám tỏa cũng vừa phải. "
        Hương Đầu: Quả chanh vàng, Cỏ đuôi ngựa, Hoa diên vĩ

        Hương giữa: Hoa Oải Hương, Hoa tím, Hương gia vị cay

        Hương cuối: Long diên hương, Gỗ đàn hương';
        $TinTuc3->Anh1 = 'rojs-3.jpg';
        $TinTuc3->Anh2 = '104908207-924277314665802-1842488111610634393-n.jpg';
        $TinTuc3->Anh3 = '105542418-924277164665817-5819657551346933288-n.jpg';
        $TinTuc3->save();

        $TinTuc4 = new TinTuc();
        $TinTuc4->TieuDe = 'Issey Matiere Vetiver - khám phá sự tương tác giữa nước và gỗ cay.';
        $TinTuc4->PhuDe = 'Mạnh mẽ và đầy gỗ, VÉTIVER khám phá sự tương tác giữa nước và gỗ cay. Đó là sự tương phản giữa tính lưu động và tươi mát của nước và những nốt hương mạnh mẽ của rễ cỏ hương bài, ca ngợi sự nam tính vượt thời gian và có khả năng gây nghiện.';
        $TinTuc4->NoiDung = 'Mạnh mẽ và đầy gỗ, VÉTIVER khám phá sự tương tác giữa nước và gỗ cay. Đó là sự tương phản giữa tính lưu động và tươi mát của nước và những nốt hương mạnh mẽ của rễ cỏ hương bài, ca ngợi sự nam tính vượt thời gian và có khả năng gây nghiện.
        Là nốt hương chủ đạo, nốt hương cỏ vetiver được tăng cường ở tầng hương giữa. Ở tầng hương cuối, vetiver được nâng lên bởi vị cay của gừng và hương xô thơm ấm áp trong một bầu hương ca ngợi bản chất sống động, nguyên sơ. Thích hợp cho mùa xuân, hè.';
        $TinTuc4->Anh1 = 'z4380618665985-2bad1f0d6b90f83da8fd2f9ad78e0a38.jpg';
        $TinTuc4->Anh2 = 'img-p-3-9-4-5-7-39457-thickbox-default.jpg';
        $TinTuc4->Anh3 = '135419-4.jpg';
        $TinTuc4->save();

        $TinTuc5 = new TinTuc();
        $TinTuc5->TieuDe = 'Givenchy Gentleman Society - Sâu sắc và đa điện.';
        $TinTuc5->PhuDe = 'Được chế tác bằng những nguyên liệu thô đặc biệt, Gentleman Society là biểu tượng cho bí quyết chế tác độc đáo của Givenchy.';
        $TinTuc5->NoiDung = 'Được chế tác bằng những nguyên liệu thô đặc biệt, Gentleman Society là biểu tượng cho bí quyết chế tác độc đáo của Givenchy. Hương đầu của Cây xô thơm tươi kết hợp với hương hoa của Hoa thủy tiên hoang dã tuyệt đối, loài hoa được nuôi trồng riêng ở trung tâm nước Pháp. Sự nở rộ này tương phản với sự bí ẩn của cỏ Vetiver được thu hoạch ở Madagascar, Uruguay và Haiti. Sự ấm áp ngọt ngào của Vanilla tan chảy với tinh chất Gỗ đàn hương và Gỗ tuyết tùng để tạo ra lớp nền gây nghiện và để lại dấu vết đáng nhớ phía sau. Givenchy Gentleman Society bám ổn, sâu sắc và là một mùi hương đa diện.
        MỘT TINH THẦN HIỆN ĐẠI, ĐƯƠNG ĐẠI
        Luôn định nghĩa lại sự thanh lịch, Gentleman Society tập hợp một cộng đồng mới được xây dựng dựa trên sự hiểu biết đa diện và kiên định về tư duy tiến bộ và nam tính. Phấn đấu hướng tới sự sáng tạo và tính xác thực, cộng đồng này chia sẻ các giá trị về sự tôn trọng, tư duy cởi mở và tinh thần đương đại, sắc sảo. Cùng nhau, họ phát minh lại các quy tắc để truyền cảm hứng cho một loại nước hoa thống nhất, không giống bất kỳ loại nào khác. Givenchy mời bạn tham gia "Hiệp hội quý ông". Nó không phải là một nơi, đó là một trạng thái của tâm trí.';
        $TinTuc5->Anh1 = '30385b4924b1fbefa2a0.jpg';
        $TinTuc5->Anh2 = 'givenchy-plus-beauty-plus-gentleman-plus-society-plus-perfume-plus-for-plus-men-plus-woahstyle-com-plus-by-plus-nathalie-plus-martin-2655.jpg';
        $TinTuc5->Anh3 = 'nm-4526573-100000-a.jpg';
        $TinTuc5->save();

        $TinTuc6 = new TinTuc();
        $TinTuc6->TieuDe = 'A Men Ultimate EDT - Real hero.';
        $TinTuc6->PhuDe = 'A*MEN Ultimate là hiện thân phi thường của một siêu anh hùng thời hiện đại. Một hương thơm từ tính, sôi động cho một nam tính hiện đại, quyến rũ.        ';
        $TinTuc6->NoiDung = 'Có thể là hình ảnh về nước hoa và văn bản cho biết A*Men Ultimate Mugler for men main accords coffee woody fresh spicy aromatic citrus conifer sweet lactonic fresh Cappuccino Balsam Fir Cedar Bergamot Nhóm hương chủ đạo cà ohê và gỗ», kèm chút chua thanh của cam bergamot. Mở đầu bằng hương thơm tươi mát, nhưng khi khô đi đọng lại lớp hương thủy sinh và ozonic của gá» thông cùng mùi ngọt ngào của cà phê Cappuccino. Có khả năng lưu hương và bám tỏa trung bình.
        Lấy cảm hứng trực tiếp từ bình rượu whisky, chai A*Men mang tính biểu tượng là vật tổ nam tính được đánh dấu bằng một ngôi sao, biểu tượng của siêu sức mạnh MU.GLER. Trong phiên bản Ultimate, chai bọc cao su được kết hợp với khối màu ngọc lam sáng, tạo hiệu ứng từ tính mạnh mẽ.
        Hương Chính: Cam Bergamot, Gỗ tuyết tùng, Cappuccino, Nhựa cây tuyết tùng
        A*MEN Ultimate mở đầu với hương gỗ tuyết tùng và cam bergamot xanh mang lại một năng lượng tươi mới, tiếp thêm sinh lực cho nước hoa, sự hòa hợp giữa hương nhựa cây tuyết tùng nhắc bạn nhớ đến những nốt hương của nước hoa cổ điển. Hương thơm lâu dài thêm một chút Cappuccino hấp dẫn sẽ để lại ấn tượng rất quyến rũ.';
        $TinTuc6->Anh1 = 'ef9a4a5c742aaa74f33b.jpg';
        $TinTuc6->Anh2 = 'amen-ultimate-by-thierry-mugle-1642507913-c37b0cee-progressive.jpg';
        $TinTuc6->Anh3 = 'nuoc-hoa-amen-mugler-ultimate.jpg';
        $TinTuc6->save();
    }
}
