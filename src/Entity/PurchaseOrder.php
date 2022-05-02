<?php

namespace App\Entity;

use App\Repository\PurchaseOrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PurchaseOrderRepository::class)
 */
class PurchaseOrder
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="purchaseOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $recipientName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $recipientEmail;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $recipientPhoneNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $addressDelivery;

    /**
     * @ORM\Column(type="integer")
     */
    private $totalQuantity;

    /**
     * @ORM\Column(type="bigint")
     */
    private $totalPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reasonCancel;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $titleCancel;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="canceledOrders")
     */
    private $cancelBy;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updateAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deleteAt;

    /**
     * @ORM\OneToMany(targetEntity=OrderItem::class, mappedBy="purchaseOrder", orphanRemoval=true)
     */
    private $orderItems;

    /**
     * @ORM\OneToMany(targetEntity=Payment::class, mappedBy="purchaseOrder", orphanRemoval=true)
     */
    private $payments;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $amountDiscount;

    /**
     * @ORM\ManyToOne(targetEntity=Discount::class, inversedBy="purchaseOrders")
     */
    private $discount;

    public function __construct()
    {
        $this->orderItems = new ArrayCollection();
        $this->payments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getRecipientName(): ?string
    {
        return $this->recipientName;
    }

    public function setRecipientName(string $recipientName): self
    {
        $this->recipientName = $recipientName;

        return $this;
    }

    public function getRecipientEmail(): ?string
    {
        return $this->recipientEmail;
    }

    public function setRecipientEmail(string $recipientEmail): self
    {
        $this->recipientEmail = $recipientEmail;

        return $this;
    }

    public function getRecipientPhoneNumber(): ?string
    {
        return $this->recipientPhoneNumber;
    }

    public function setRecipientPhoneNumber(string $recipientPhoneNumber): self
    {
        $this->recipientPhoneNumber = $recipientPhoneNumber;

        return $this;
    }

    public function getAddressDelivery(): ?string
    {
        return $this->addressDelivery;
    }

    public function setAddressDelivery(string $addressDelivery): self
    {
        $this->addressDelivery = $addressDelivery;

        return $this;
    }

    public function getTotalQuantity(): ?int
    {
        return $this->totalQuantity;
    }

    public function setTotalQuantity(int $totalQuantity): self
    {
        $this->totalQuantity = $totalQuantity;

        return $this;
    }

    public function getTotalPrice(): ?string
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(string $totalPrice): self
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getReasonCancel(): ?string
    {
        return $this->reasonCancel;
    }

    public function setReasonCancel(?string $reasonCancel): self
    {
        $this->reasonCancel = $reasonCancel;

        return $this;
    }

    public function getTitleCancel(): ?string
    {
        return $this->titleCancel;
    }

    public function setTitleCancel(?string $titleCancel): self
    {
        $this->titleCancel = $titleCancel;

        return $this;
    }

    public function getCancelBy(): ?User
    {
        return $this->cancelBy;
    }

    public function setCancelBy(?User $cancelBy): self
    {
        $this->cancelBy = $cancelBy;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?\DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getDeleteAt(): ?\DateTimeInterface
    {
        return $this->deleteAt;
    }

    public function setDeleteAt(?\DateTimeInterface $deleteAt): self
    {
        $this->deleteAt = $deleteAt;

        return $this;
    }

    /**
     * @return Collection<int, OrderItem>
     */
    public function getOrderItems(): Collection
    {
        return $this->orderItems;
    }

    public function addOrderItem(OrderItem $orderItem): self
    {
        if (!$this->orderItems->contains($orderItem)) {
            $this->orderItems[] = $orderItem;
            $orderItem->setPurchaseOrder($this);
        }

        return $this;
    }

    public function removeOrderItem(OrderItem $orderItem): self
    {
        if ($this->orderItems->removeElement($orderItem)) {
            // set the owning side to null (unless already changed)
            if ($orderItem->getPurchaseOrder() === $this) {
                $orderItem->setPurchaseOrder(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Payment>
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function addPayment(Payment $payment): self
    {
        if (!$this->payments->contains($payment)) {
            $this->payments[] = $payment;
            $payment->setPurchaseOrder($this);
        }

        return $this;
    }

    public function removePayment(Payment $payment): self
    {
        if ($this->payments->removeElement($payment)) {
            // set the owning side to null (unless already changed)
            if ($payment->getPurchaseOrder() === $this) {
                $payment->setPurchaseOrder(null);
            }
        }

        return $this;
    }

    public function getAmountDiscount(): ?int
    {
        return $this->amountDiscount;
    }

    public function setAmountDiscount(?int $amountDiscount): self
    {
        $this->amountDiscount = $amountDiscount;

        return $this;
    }

    public function getDiscount(): ?Discount
    {
        return $this->discount;
    }

    public function setDiscount(?Discount $discount): self
    {
        $this->discount = $discount;

        return $this;
    }
}
