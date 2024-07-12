<section id="configData">
  <div class="dataContain">

    <div class="dataFlex">
      <!-- ====== Sidenav ======== -->
      <div class="DataSideNav">
        <ul>
          <li class="active">LINK Check</li>
          <li class="">SEO Check</li>
        </ul>
      </div>
      <!-- ====== /Sidenav ======== -->

      <!-- ====== MainCol ======== -->
      <div class="DataMain"><!-- #DataCheck -->
        <div class="Dataclild dataLinkCheck active">
          <div class="selectLinkType">
            <input type="checkbox" name="notSetLink" value="1" checked="checked">未設定リンク
            <input type="checkbox" name="interLink" value="2" checked="checked">内部リンク
            <input type="checkbox" name="exterLink" value="3" checked="checked">外部リンク
            <input type="checkbox" name="dangerLink" value="4" checked="checked">注意リンク
          </div>
          <ul class="links">
            <!-- debug.jsによって挿入されます。 -->
          </ul>
          <div class="pdfsWrap">
            <h2>PDF CHECK</h2>
            <input type="checkbox" name="oneFile" value="1">重複していないファイル
            <ul class="pdfs">
              <!-- debug.jsによって挿入されます。 -->
            </ul>
          </div>
        </div>

        <div class="Dataclild seoCheck">
          <h2>Google 検索結果表示</h2>
          <div class="googleResult">
            <p class="url"><span class="hed"></span><span class="resBreadcrumb"></span><span class="trl"></span></p>
            <p class="title"></p>
            <p class="description"></p>
          </div>

          <table class="metasTable">
            <tbody>
              <tr>
                <td>title</td>
                <td class="title"></td>
              </tr>
              <tr>
                <td>description</td>
                <td class="description"></td>
              </tr>
              <tr>
                <td>og title</td>
                <td class="ogTitle"></td>
              </tr>
              <tr>
                <td>og type</td>
                <td class="ogType"></td>
              </tr>
              <tr>
                <td>og url</td>
                <td class="ogUrl"></td>
              </tr>
              <tr>
                <td>og description</td>
                <td class="ogDescription"></td>
              </tr>
              <tr>
                <td>og site name</td>
                <td class="ogSitename"></td>
              </tr>
              <tr>
                <td>og locale</td>
                <td class="ogLocale"></td>
              </tr>
              <tr>
                <td>twitter card</td>
                <td class="twitterCard"></td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
      <!-- ====== /MainCol ======== -->
    </div>

  </div>
</section>
