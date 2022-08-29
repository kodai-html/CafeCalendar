@extends('layouts.app')
@section('content')
<div id="app">
    <div class="container">
        <div class="row justify-content-center cafe-img">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <a class="btn btn-outline-secondary float-left" href="{{ url('/?date=' . $calendar->getPreviousMonth()) }}">前の月</a>
                        
                        <span>{{ $calendar->getTitle() }}</span>
                        
                        <a class="btn btn-outline-secondary float-right" href="{{ url('/?date=' . $calendar->getNextMonth()) }}">次の月</a>
                    </div>
                    <div class="card-body">

                        {!! $calendar->render() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="sec-content fixed-bg">
            <h2 class="sec-title black-title">Osaki Coffee</h2>
        </div>

        <div class="sub-content">
            <section id="drink">
                <div class="drink">
                    <h2>DRINK</h2>
                </div>
                <div class="drink-content">
                    <div class="menu-img">
                        <img class="drink-img" src="../../resources/img/coffee.jpeg" alt="画像">
                    </div>
                    <div class="drink-type">
                        <dl>
                            <dt>オレンジジュース</dt>
                            <dd>&yen;200</dd>
                            <dt>コーラ</dt>
                            <dd>&yen;200</dd>
                            <dt>アメリカンコーヒー</dt>
                            <dd>&yen;270</dd>
                            <dt>ホットコーヒー</dt>
                            <dd>&yen;270</dd>
                            <dt>ミルクコーヒー</dt>
                            <dd>&yen;340</dd>
                            <dt>カフェラテ</dt>
                            <dd>&yen;320</dd>
                            <dt>ソイラテ</dt>
                            <dd>&yen;370</dd>
                        </dl>
                    </div>
                </div>
                <div id="read">
                    <p id="more">other drink</p>
                </div>
                <div>

                </div>
                <div id="add_drink">
                    <dl id="fead">
                        <dt>オーツラテ</dt>
                        <dd>&yen;370</dd>
                        <dt>カプチーノ</dt>
                        <dd>&yen;320</dd>
                        <dt>カフェモカ</dt>
                        <dd>&yen;380</dd>
                        <dt>コールドブリューコーヒー</dt>
                        <dd>&yen;600</dd>
                        <dt>カフェミスト</dt>
                        <dd>&yen;600</dd>
                        <dt>エスプレッソ</dt>
                        <dd>&yen;600</dd>
                    </dl>
                    <dl id="fead">
                        <dt>ムースフォームラテ</dt>
                        <dd>&yen;600</dd>
                        <dt>エスプレッソコンパナ</dt>
                        <dd>&yen;600</dd>
                        <dt>ハニーミルクラテ</dt>
                        <dd>&yen;600</dd>
                        <dt>キャラメルフラペチーノ</dt>
                        <dd>&yen;600</dd>
                        <dt>トロベリーフラペチーノ</dt>
                        <dd>&yen;600</dd>
                    </dl>
                </div>
            </section>
            <section id="food">
                <div>
                    <h2>FOOD</h2>
                </div>
                <div class="food-content">
                    <div class="food-type">
                        <dl>
                            <dt>アメリカン・クラブハウスサンド</dt>
                            <dd>&yen;650</dd>
                            <dt>濃厚カルボナーラサンド</dt>
                            <dd>&yen;680</dd>
                            <dt>バジルチキンとアボカドのパスタ</dt>
                            <dd>&yen;720</dd>
                            <dt>新鮮トマトのサルサライス</dt>
                            <dd>&yen;680</dd>
                            <dt>絶品マグロのアボカドサラダ丼</dt>
                            <dd>&yen;700</dd>
                            <dt>シェフの気まぐれプレート</dt>
                            <dd>&yen;720</dd>
                            <dt>鶏肉の和風パスタ</dt>
                            <dd>&yen;700</dd>
                        </dl>
                    </div>
                    <div class="menu-img">
                        <img class="food-img" src="../../resources/img/375811-sepik.jpg" alt="画像">
                    </div>
                </div>
            </section>
    
            <section id="review">
                <div class="fixed-bg">
                    <h2 class="review">REVIEW</h2>
                </div>
                <div>
                    <h4 class="review-title">オシャレで使い勝手の良いカフェ</h4>
                    <p class="rev-name">佐藤 さん</p>
                    <p class="review-content">
                        町屋駅から徒歩10分以内くらい。
                        商店街の1本路地に入ったところにあります。
                        下町の町屋に、こんなオシャレなカフェがあるとは！！

                        土曜日のお昼に訪問しましたが、比較的空いておりました。
                        家族連れもいれば、カップル、友達同士、一人客など、様々な客層のお客様がいらしていました。
                        店内は、アメリカンな雰囲気です。
                        天井も高く、居心地の良い空間です。

                        私は、ランチ&PC立ち上げて少し勉強しようと、訪問。

                        肉スパとグリーンサラダをいただきました。

                        サラダは、野菜が新鮮で、美味しかったです。
                        肉スパも、醤油オイルベースのソースのパスタに、豪快にお肉が乗って、食べ応えがありました。
                        日本人が好きなお味です。お肉も、柔らかく、味がしっかり染みていて、美味しかったですね。

                        追加で、コーヒーを頼んで、3時間くらい滞在しておりました。

                        土日だからということもあるかもしれませんが、サラダ・パスタ・コーヒーを頼んで2500円弱でしたので、下町価格からするとちょっとお高めです。

                        でも、料理は美味しく、居心地の良い空間に長居できると思えば、コスパは悪くないかもです。
                    </p>
                </div>
                <div>
                    <h4 class="review-title">お洒落さと美味しさ、地域に根ざした感のある良いお店でした</h4>
                    <p class="rev-name">ひげひげ さん</p>
                    <p>
                        前々から気になっていました
                        でもオヤジひとりで入ることに、気持ちの小さい私は躊躇して・・
                        この日、お店の前を通り過ぎながら店内を見てみると
                        席が適度に空いている感じを受けて、勇気を持ってドアを開けてみたのです

                        鶏肉の和風パスタ

                        刻まれた大葉がのせられて見た目の色合いが良かったです
                        具材に鶏肉がゴロゴロと思っていた以上に入っていて満足感が増します
                        鷹の爪、椎茸に占地が入り醤油で味付けのベースを作られていて
                        正に和風でパスタの焼きそば的な味の印象でもありました
                        パスタの茹で具合も良く、仄かに芯を葉で噛んで感じつつ
                        プルンッと跳ね返る弾力も保たれていて美味しかったです

                        初めての利用でしたが総体的に満足♪

                        一本裏通りで喧騒から離れゆっくりと時間を過ごせるお店
                        自転車を停めるスペースが店前にあって来やすいお店でもあると思います
                        お会計を済ませてお店を出る時におばちゃんたちが入って来て
                        楽しくランチ集会を開く様子に地元に根ざした感じも受けました
                    </p>
                </div>

                <form method="POST" action="{{ route('review') }}">
                    @csrf
                    <form-group>
                        <input class="form-control" type="text" name="name"placeholder="ニックネーム"><br>
                    </form-group>
                    <form-group>
                        <input class="form-control" type="text" name="title" placeholder="タイトル"><br>
                    </form-group>
                    <form-group>
                        <textarea class="form-control" name="content" cols="30" rows="10" placeholder="ご感想"></textarea>
                    </form-group>
                    <button type="submit" class="btn btn-success">送信</button>
                </form>
            </section>
            <section id="location">
                <div class="location-img fixed-bg">
                    <h2 class="sec-title white-title">LOCATION</h2>
                </div>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2695.222558780708!2d139.72962045708195!3d35.61421674882982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188a8a88a8df11%3A0xb03f46b8fab857b!2z5L2P5Y-L5LiN5YuV55Sj5aSn5bSO44Ks44O844OH44Oz44K_44Ov44O8!5e0!3m2!1sja!2sjp!4v1654508116129!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div>
                    <p>
                        ■ ビル/Building<br> 
                        住友不動産大崎ガーデンタワー/SUMITOMO FUDOSAN OSAKI GARDEN TOWER<br> 
                        東京都品川区西品川一丁目１番１号<br> <br> 

                        open 7 days a week<br> 
                        6:00am to 21:00pm<br> <br> 

                        tel : 090-1234-5678
                    </p>
                </div>
            </section>
        </div>
    </div>
    {{-- 上まで戻す機能 --}}
    <div>
        <a href="#index" class="btn btn-light float-right">TOPへ戻る</a>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('extra_holiday_setting') }}">臨時休日設定</a>
        <a class="btn btn-outline-secondary" href="{{ route('holiday_setting') }}">休日設定</a>
        <a class="btn btn-outline-secondary" href="{{ route('reviewList') }}">レビュー確認</a>
    </div>
</div>
<script>
    $(function(){
        $('a[href^="#"]').click(function(){
            var href= $(this).attr("href");
            var target = $(href == "#" || href == "" ? 'html' : href);
            var position = target.offset().top;
            $("html, body").animate({scrollTop:position}, 600, "swing");
            return false;
        });

        let add = $('#add_drink').children('dl');

        $(add).hide();
        $('#more').on('click', () => {
            $(add).fadeToggle('swing');
        });
    });
</script>
@endsection
