<?php
declare(strict_types=1);

namespace AnarchyService\DB;

/**
 * Class Json
 * @package AnarchyService
 */
class Json
{
    private $DBDir;

    public function __construct()
    {
        $this->DBDir = getenv('jsonDBDir');
    }

    /**
     * @param $DBName
     * @param $TableName
     * @return bool
     */
    public function DeleteTable($DBName, $TableName)
    {
        return unlink($this->DBDir . '/' . $DBName . '/' . $TableName . '.json');
    }

    /**
     * @param $DBName
     * @return bool
     */
    public function DeleteDB($DBName)
    {
        $files = array_diff(scandir($this->DBDir . '/' . $DBName), ['.', '..']);
        foreach ($files as $file) {
            (is_dir($this->DBDir . '/' . $DBName . '/' . $file)) ? $this->DeleteDB($this->DBDir . '/' . $DBName . '/' . $file) : unlink($this->DBDir . '/' . $DBName . '/' . $file);
        }
        return rmdir($this->DBDir . '/' . $DBName);
    }

    /**
     * @param string $DBName
     * @param string $TableName
     * @param array $data
     * @return false|int
     */
    public function InsertData($DBName, $TableName, array $data)
    {
        $fileName = $this->DBDir . '/' . $DBName . '/' . $TableName . '.json';
        if (!is_file($fileName)) {
            return $this->CreateTable($DBName, $TableName, $data);
        } else {
            $out = json_decode(file_get_contents($fileName));
            $out[] = $data;
            return file_put_contents($fileName, json_encode($out));
        }
    }

    /**
     * @param string $DBName
     * @param string $TableName
     * @param array $columns
     * @param int|string $mode
     * @return false|int
     */
    public function CreateTable($DBName, $TableName, array $columns, $mode = 0600)
    {
        if (!is_dir($DBName)) {
            $this->CreateDB($DBName, 0700);
        }
        $json = json_encode([$columns]);
        $fileName = $this->DBDir . '/' . $DBName . '/' . $TableName . '.json';
        $res = file_put_contents($fileName, $json);
        $res .= chmod($fileName, $mode);
        return $res;
    }

    /**
     * @param string $DBName
     * @param int $mode
     * @return bool
     */
    public function CreateDB($DBName, int $mode = 0700)
    {
        if (!is_dir($this->DBDir)) {
            mkdir($this->DBDir, 0700);
        }
        $Folders = explode('/', $DBName);
        $dir = '';
        $return = '';
        foreach ($Folders as $folder) {
            $dir .= '/' . $folder;
            if (!is_dir($this->DBDir . $dir)) {
                $return .= mkdir($this->DBDir . $dir, $mode);
            }
        }
        return $return;
    }

    /**
     * @param string $DBName
     * @param string $TableName
     * @param array $data
     * @param array $where
     * @return false|int
     */
    public function UpdateData($DBName, $TableName, array $data, array $where)
    {
        $fileName = $this->DBDir . '/' . $DBName . '/' . $TableName . '.json';
        $out = json_decode(file_get_contents($fileName));
        foreach ($out as $item) {
            $res = true;
            foreach ($where as $key => $value) {
                if ($item->$key != $value || !$item->$key) {
                    $res = false;
                    break;
                }
            }
            if ($res) {
                foreach ($data as $key => $value) {
                    $item->$key = $value;
                }
            }
        }
        return file_put_contents($fileName, json_encode($out));
    }

    /**
     * @param string $DBName
     * @param string $TableName
     * @param array|null $where
     * @return false|int
     */
    public function DeleteData($DBName, $TableName, array $where)
    {
        $fileName = $this->DBDir . '/' . $DBName . '/' . $TableName . '.json';
        if (is_file($fileName)) {
            $out = json_decode(file_get_contents($fileName));
            $i=-1;
            foreach ($out as $item) {
                $i++;
                $res = true;
                foreach ($where as $key => $value) {
                    if ($item->$key != $value || !$item->$key) {
                        $res = false;
                        break;
                    }
                }
                if ($res) {
                    unset($out[$i]);
                }
            }
            $out = array_values($out);
            return file_put_contents($fileName, json_encode($out));
        } else {
            return false;
        }
    }

    /**
     * @param string $DBName
     * @param string $TableName
     * @param null $where
     * @param null $limit
     * @return array|mixed
     */
    public function SelectData($DBName, $TableName, array $where = null, int $limit = null)
    {
        $fileName = $this->DBDir . '/' . $DBName . '/' . $TableName . '.json';
        if (is_file($fileName)) {
            $out = json_decode(file_get_contents($fileName));
            if ($where == null) {
                return $out;
            } else {
                $items = [];
                foreach ($out as $item) {
                    $res = true;
                    foreach ($where as $key => $value) {
                        if ($item->$key != $value || !$item->$key) {
                            $res = false;
                            break;
                        }
                    }
                    if ($res) {
                        $items[] = $item;
                    }
                    if ($limit != null && count($items) >= $limit) {
                        break;
                    }
                }
                if (count($items) == 1) {
                    return (object)$items[0];
                } elseif (empty($items)) {
                    return false;
                } else {
                    return (object)$items;
                }
            }
        } else {
            return false;
        }
    }
}
