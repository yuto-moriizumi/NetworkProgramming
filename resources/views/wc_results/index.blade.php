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
        <form action="" method="GET">
            {{ csrf_field() }}
            <div>
                <label>大会で絞る</label><br>
                <select name="tournament_id">
                    <?php foreach ($search_info["tournaments"] as $option):?>
                        <option value=<?=$option["id"]?>><?=$option["name"]?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php if (array_key_exists("rounds", $search_info)):?>
                <div>
                    <label>ラウンドで絞る</label><br>
                    <select name="round_id">
                        <?php foreach ($search_info["rounds"] as $option):?>
                            <option value=<?=$option["id"]?>><?=$option["name"]?></option>
                        <?php endforeach; ?>
                    </select>
                </div>                
            <?php endif; ?>
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
    </div>
@endsection
