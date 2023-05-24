<form id="formAddress">
    <div class="form-address">
        <div class="input-grroup">
            <label for=""> <span>điện thoại</span></label>
            <input required type="text" placeholder="" name="phone" value="<?php if(isset($data['arr-info'])){echo $data['arr-info'][7];}?>">
        </div>
        <div class="input-grroup">
            <label for=""> <span>Quốc gia</span> </label>
            <input required type="text" placeholder="" name="nation" value="<?php if(isset($data['arr-info'])){echo $data['arr-info'][6];}?>">
        </div>
        <div class="input-grroup">
            <label for=""> <span>Tỉnh thành</span> </label>
            <input required type="text" placeholder="" name="province" value="<?php if(isset($data['arr-info'])){echo $data['arr-info'][5];}?>">
        </div>
        <div class="input-grroup">
            <label for=""> <span>Quận huyện</span> </label>
            <input required type="text" placeholder="" name="district"value="<?php if(isset($data['arr-info'])){echo $data['arr-info'][4];}?>">
        </div>
        <div class="input-grroup">
            <label for=""> <span>Phường xã</span> </label>
            <input required type="text" placeholder="" name="Wards"value="<?php if(isset($data['arr-info'])){echo $data['arr-info'][3];}?>">
        </div>
        <div class="input-grroup">
            <label for=""> <span>Tên tòa Nhà</span> </label>
            <input required type="text" placeholder="" name="houseName"value="<?php if(isset($data['arr-info'])){echo $data['arr-info'][1];}?>">
        </div>
        <div class="input-grroup">
            <label for=""> <span>Số nhà</span> </label>
            <input required type="text" placeholder="" name="hosueNumber"value="<?php if(isset($data['arr-info'])){echo $data['arr-info'][0];}?>">
        </div>
        <div class="input-grroup">
            <label for=""> <span>Đường</span> </label>
            <input required type="text" placeholder="" name="way"value="<?php if(isset($data['arr-info'])){echo $data['arr-info'][2];}?>">
        </div>
        <div class="group-btn" >
            <button class="btn-address" id="btn-address" >Lưu</button>
            <button class=" btn-address-disiabled" >Hủy bỏ</button>
        </div>
    </div>
    <input type="text" hidden name="id" value="<?php echo $data['userInfo']['MaKH']?>">

</form>