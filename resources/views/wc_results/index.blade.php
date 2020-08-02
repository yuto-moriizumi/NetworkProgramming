    <section class="content-header">
        <h1 class="pull-left">Wc Results</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('wcResults.create') }}">Add New</a>
        </h1>
    </section>
    @include{'wc_results.script'}
    
    <div class="content" >
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <form action="" method="GET">
            {{ csrf_field() }}
            <div>
                <label>過去そのチームが勝利した試合の一覧を表示 IDを入力せよ</label><br>
                <input type="number" name="id" />
            </div>
            <div>
                <input type="submit" value="Create" />
            </div>
        </form>
        <p>チームID勝利検索：<?=$val?></p>
        <h2>高度な検索</h2>
        <div id="app">
            <form action="" method="GET">
                {{ csrf_field() }}
                <div>
                    <label>大会で絞る</label><br>
                    <select v-model="tournament_id" name="tournament_id" @change="onTournamentChange">
                        <option value="null" selected>NONE</option>
                        <?php foreach ($search_info["tournaments"] as $option):?>
                            <option value=<?=$option["id"]?>><?=$option["name"]?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                    <div>
                        <label>ラウンドで絞る</label><br>
                        <select name="round_id" v-model="round_id" @change="onRoundChange">
                            <option value="null" selected>NONE</option>
                            <option value="1">ノックアウト</option>
                            <option value="2">グループ</option>
                        </select>
                    </div>  
                <div v-show="group_show">
                    <label>グループで絞る</label><br>
                    <select name="group_id" v-model="group_id">
                        <option v-for="(value,key) in groups" v-text="value" v-bind:value="key"></option>   
                    </select>
                </div>
                <div>
                    <label>チームで絞る</label><br>
                    <select name="team_id" v-model="team_id" @change="onTeamChange">
                        <option v-for="(value,key) in teams" v-text="value" v-bind:value="key"></option>
                    </select>
                </div>
                <div v-show="outcome_show">
                    <label>勝敗で絞る</label><br>
                    <select name="outcome">
                        <option value="null" selected>NONE</option>
                        <option value="1">勝利</option>
                        <option value="0">引き分け</option>
                        <option value="-1">敗北</option>
                    </select>
                </div>
                <div>
                    <input type="submit" value="Create" />
                </div>          
            </form>
            <div class="box box-primary">
                <div class="box-body">
                        @include('wc_results.table')
                </div>
            </div>
        </div>
        
        <div id="map"></div>
        <style>
            html {
                height: 100%;
            }
            body {
                height: 100%;
            }
            #map {
                height: 50%;
                width: 50%;
            }
        </style>
        
        
        <div class="text-center">
        
        </div>
        
        
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13"></script>
        <script>

        const app=new Vue({
            el:"#app",
            data:{
                teams:{
                    <?php foreach ($search_info["teams"] as $option):?>
                        <?=$option["id"]?>:"<?=$option["name"]?>",
                    <?php endforeach; ?>
                },
                groups:{
                    <?php foreach ($search_info["groups"] as $option):?>
                        <?=$option["id"]?>:"<?=$option["name"]?>",
                    <?php endforeach; ?>
                },
                tournament_id:"null",
                round_id:"null",
                group_id:"null",
                team_id:"null",
                group_show:false,
                outcome_show:false,
                map:null,
                markers:[],
                countries2mark:[
                    <?php foreach ($search_info["countries"] as $option):?>
                        {id:<?=$option["id"]?>,lat:<?=$option["lat"]?>,lng:<?=$option["lng"]?>},
                    <?php endforeach; ?>
                ],
                ICON_URL:{red:"https://maps.google.com/mapfiles/ms/icons/red-dot.png",blue:"https://maps.google.com/mapfiles/ms/icons/blue-dot.png"},
                marker2blue:[],
            },
            created:function(){
                console.log("hihihi");
            }, mounted: async function () {
                await this.sleep(1000);   // wait until loading google map javascript
                this.map = new google.maps.Map(document.getElementById("map"), {
                    center: { lat: 0, lng: 0 },
                    zoom: 1
                });
                this.drawIcons();                
            },
            methods:{
                drawIcons:function(){
                    for (let i = 0; i < this.countries2mark.length; i++) {
                        const country = this.countries2mark[i];
                        if(this.marker2blue.includes(country.id)) this.addMarker("COUNTRY", country,this.ICON_URL.blue);  
                        else this.addMarker("COUNTRY", country);  
                    }
                },
                onTournamentChange:function(){
                    this.updateTeams();
                    if (this.round_id==2) { //グループ選択済みならそちらも更新
                        this.onRoundChange();
                    }
                },
                onRoundChange:function(){
                    this.updateTeams();
                    if(this.round_id=="null"){
                        this.group_show=false;//グループ試合が選択されていない場合は非表示
                        return;
                    }else if(this.round_id==1){
                        this.group_show=false;//グループ試合が選択されていない場合は非表示
                        return;
                    }
                    //グループ一覧を更新する
                    this.group_show=true;

                    const req=new XMLHttpRequest();
                    if(this.tournament_id=="null") req.open("GET", "./api?get=groups",false);//大変なので同期処理
                    else req.open("GET", "./api?get=groups&tournament_id="+this.tournament_id,false);//大変なので同期処理
                    req.send(null);
                    const res=JSON.parse(req.responseText);

                    console.log(res);
                    res["null"]="NONE";
                    this.groups=res;
                    this.group_id="null";
                },
                onTeamChange:function(){
                    if(this.team_id=="null") this.outcome_show=false;
                    else this.outcome_show=true;                    
                },
                updateTeams:function(){
                    const req=new XMLHttpRequest();
                    if(this.tournament_id=="null") req.open("GET", "./api?get=teams",false);//大会IDが指定されていない場合
                    else if (this.round_id!=1)req.open("GET", "./api?get=teams&tournament_id="+this.tournament_id,false);//大会IDが指定されている場合
                    else req.open("GET", "./api?get=teams&tournament_id="+this.tournament_id+"&round_knockout=1",false);//さらにノックアウトに絞る
                    req.send(null);                    
                    const res=JSON.parse(req.responseText);

                    console.log(res);
                    res["null"]="NONE";
                    this.teams=res;
                    this.team_id="null";
                },
                sleep: function (msec) {
                    return new Promise((resolve) => {
                        setTimeout(() => { resolve() }, msec);
                    })
                },
                clearMarkers: function () {
                    this.markers.forEach((marker) => {
                        marker.setMap(null);
                    })
                    this.markers = [];
                },
                hello:function(array){
                    this.marker2blue=array;
                    this.clearMarkers();
                    this.drawIcons();
                    console.log(this.marker2blue);
                    console.log(this.countries);
                },
                addMarker(title, location, icon_url=this.ICON_URL.red) {
                    let marker = new google.maps.Marker(
                        {
                            position: location,
                            map: this.map,
                            title: title,
                            icon:{url:icon_url}
                        }
                    );
                    return marker;
                },
                    }
                });
        </script>
    </div>