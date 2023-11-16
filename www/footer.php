<div id="modalLoading" class="modal modal-loading" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <i class="fa fa-spinner fa-pulse fa-3x text-primary"></i>
            <div id="percent" style="padding:1rem;color:white;display:none"></div>
        </div>
    </div>
</div>
<div class="modal fade" id="confirmModal">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <!-- Modal body -->
        <div class="modal-body m-4">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <div class="container-fluid">
                <div class="d-flex justify-content-around divBtnList">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnConfirm">확인</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnClose">취소</button>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="alertModal">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <!-- Modal body -->
        <div class="modal-body">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <div class="container-fluid">
                <div class="d-flex justify-content-around divBtnList">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">확인</button>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
</form>
</body>
</html>