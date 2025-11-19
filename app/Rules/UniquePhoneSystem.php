<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniquePhoneSystem implements ValidationRule
{
    protected string $column;   // Cột cần check: phone, idCard, accountId
    protected ?int $ignoreId;   // ID record hiện tại để bỏ qua khi update

    /**
     * Constructor
     *
     * @param string $column Cột cần kiểm tra
     * @param int|null $ignoreId ID cần bỏ qua (update)
     */
    public function __construct(string $column = 'phone', ?int $ignoreId = null)
    {
        $this->column = $column;
        $this->ignoreId = $ignoreId;
    }

    /**
     * Thực hiện validation.
     *
     * @param string $attribute Tên field
     * @param mixed $value Giá trị field
     * @param Closure $fail Callback báo lỗi
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Kiểm tra bảng bệnh nhân
        $existsInPatients = DB::table('tblpatients')
            ->when($this->ignoreId, fn($q) => $q->where('patientId', '!=', $this->ignoreId))
            ->where($this->column, $value)
            ->exists();

        // Chỉ check các cột tồn tại trong staff
        $staffColumns = ['phone'];
        $existsInStaff = in_array($this->column, $staffColumns)
            ? DB::table('tblstaff')->where($this->column, $value)->exists()
            : false;

        if ($existsInPatients || $existsInStaff) {
            $label = match ($attribute) {
                'phone'     => 'Số điện thoại',
                default     => $attribute,
            };
            $fail("$label đã tồn tại trong hệ thống.");
        }
    }
}
