@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Wc Results</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('wcResults.create') }}">Add New</a>
        </h1>
    </section>
    
    <div class="content">
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
        <form action="" method="GET" id="app">
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
            },
            created:function(){
                console.log("hihihi");
            },
            methods:{
                onTournamentChange:function(){
                    console.log(this.tournament_id,"tournament change");
                    const req=new XMLHttpRequest();
                    if(this.tournament_id=="null") req.open("GET", "./api?get=teams",false);//大変なので同期処理
                    else req.open("GET", "./api?get=teams&tournament_id="+this.tournament_id,false);//大変なので同期処理
                    req.send(null);                    
                    const res=JSON.parse(req.responseText);

                    console.log(res);
                    res["null"]="NONE";
                    this.teams=res;
                    this.team_id="null";

                    if (this.round_id==2) { //グループ選択済みならそちらも更新
                        this.onRoundChange();
                    }
                },
                onRoundChange:function(){
                    if(this.round_id!=2)this.group_show=false; //グループ試合が選択されていない場合は非表示
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
                }
            }
        });
        </script>
    </div>
@endsection
